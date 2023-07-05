<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Kriteria;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TopsisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data kafe dari database
        $cafes = Cafe::all();
    
        // Hitung matriks keputusan
        $decisionMatrix = $this->createDecisionMatrix($cafes);

        return view('layouts.matrixkeputusan', compact('decisionMatrix'));
        
    }

    public function indexNormalize()
    {
        $cafes = Cafe::all();

        // Hitung matriks keputusan
        $decisionMatrix = $this->createDecisionMatrix($cafes);

        // Hitung matriks ternormalisasi
        $normalizedMatrix = $this->calculateNormalizedMatrix($decisionMatrix);

        return view('layouts.normalizedmatrix', compact('normalizedMatrix'));
    }

    public function indexWeight()
    {
        // Ambil data kafe dari database
        $cafes = Cafe::all();

        // Hitung matriks keputusan
        $decisionMatrix = $this->createDecisionMatrix($cafes);

        // Hitung matriks ternormalisasi
        $normalizedMatrix = $this->calculateNormalizedMatrix($decisionMatrix);

        // Hitung matriks terbobot
        $weightedMatrix = $this->calculateWeightedMatrix($normalizedMatrix);

        return view('layouts.weightedmatrix', compact('cafes', 'weightedMatrix'));
    }

    public function indexPositive()
    {
        // Ambil data kafe dari database
        $cafes = Cafe::all();
    
        // Hitung matriks keputusan
        $decisionMatrix = $this->createDecisionMatrix($cafes);
    
        // Hitung matriks ternormalisasi
        $normalizedMatrix = $this->calculateNormalizedMatrix($decisionMatrix);
    
        // Hitung matriks terbobot
        $weightedMatrix = $this->calculateWeightedMatrix($normalizedMatrix);
    
        // Hitung solusi ideal positif
        $positiveIdealSolution = $this->calculatePositiveIdealSolution($weightedMatrix);
    
        return view('layouts.positiveideal', compact('positiveIdealSolution'));
    }    

    public function indexNegative()
    {
        // Ambil data kafe dari database
        $cafes = Cafe::all();

        // Hitung matriks keputusan
        $decisionMatrix = $this->createDecisionMatrix($cafes);

        // Hitung matriks ternormalisasi
        $normalizedMatrix = $this->calculateNormalizedMatrix($decisionMatrix);

        // Hitung matriks terbobot
        $weightedMatrix = $this->calculateWeightedMatrix($normalizedMatrix);

        // Hitung solusi ideal negatif
        $negativeIdealSolution = $this->calculateNegativeIdealSolution($weightedMatrix);

        return view('layouts.negativeideal', compact('negativeIdealSolution'));
    }

    public function indexDistances()
    {
        // Ambil data kafe dari database
        $cafes = Cafe::all();
    
        // Hitung matriks keputusan
        $decisionMatrix = $this->createDecisionMatrix($cafes);
    
        // Hitung matriks ternormalisasi
        $normalizedMatrix = $this->calculateNormalizedMatrix($decisionMatrix);
    
        // Hitung matriks terbobot
        $weightedMatrix = $this->calculateWeightedMatrix($normalizedMatrix);
    
        // Hitung solusi ideal negatif
        $negativeIdealSolution = $this->calculateNegativeIdealSolution($weightedMatrix);
    
        // Hitung solusi ideal positif
        $positiveIdealSolution = $this->calculatePositiveIdealSolution($weightedMatrix);
    
        // Hitung jarak antara nilai terbobot dengan solusi ideal
        $distances = $this->calculateWeightedDistances($weightedMatrix, $positiveIdealSolution, $negativeIdealSolution);
    
        $positiveDistances = $distances['positiveDistances'];
        $negativeDistances = $distances['negativeDistances'];
    
        return view('layouts.distances', compact('positiveDistances', 'negativeDistances', 'cafes'));
    }
    

    /**
     * Create the decision matrix based on cafes.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $cafes
     * @return array
     */
    private function createDecisionMatrix($cafes)
    {
        // Inisialisasi matriks keputusan
        $decisionMatrix = [];

        foreach ($cafes as $cafe) {
            $decisionMatrix[] = [
                'suasana' => (float) $cafe->suasana,
                'kenyamanan' => (float) $cafe->kenyamanan,
                'kualitas' => (float) $cafe->kualitas,
                'harga' => (float) $cafe->harga,
                'wifi' => (float) $cafe->wifi,
                'pelayanan' => (float) $cafe->pelayanan,
                'kebersihan' => (float) $cafe->kebersihan,
                'lokasi' => (float) $cafe->lokasi,
                'menu_unik' => (float) $cafe->menu_unik,
                'respon_pelanggan' => (float) $cafe->respon_pelanggan,
            ];
        }

        return $decisionMatrix;
    }

    /**
     * Calculate the normalized matrix based on the decision matrix.
     *
     * @param  array  $decisionMatrix
     * @return array
     */
    private function calculateNormalizedMatrix($decisionMatrix)
    {
        $normalizedMatrix = [];

        // Menghitung jumlah kuadrat setiap kolom
        $sumOfSquares = array_reduce($decisionMatrix, function ($carry, $item) {
            foreach ($item as $key => $value) {
                $carry[$key] = isset($carry[$key]) ? $carry[$key] + pow($value, 2) : pow($value, 2);
            }
            return $carry;
        }, []);

        // Menghitung akar kuadrat dari jumlah kuadrat setiap kolom
        $sqrtSumOfSquares = array_map('sqrt', $sumOfSquares);

        // Menormalisasi setiap elemen dalam matriks keputusan menggunakan rumus vektor normalisasi
        foreach ($decisionMatrix as $row) {
            $normalizedRow = [];
            foreach ($row as $key => $value) {
                $normalizedRow[$key] = $value / $sqrtSumOfSquares[$key];
            }
            $normalizedMatrix[] = $normalizedRow;
        }

        return $normalizedMatrix;
    }

    private function calculateWeightedMatrix($normalizedMatrix)
    {
        $weightedMatrix = [];

        // Ambil bobot kriteria dari tabel kriteria
        $criteriaWeights = Kriteria::pluck('bobot', 'nama_kriteria')->toArray();

        foreach ($normalizedMatrix as $row) {
            $weightedRow = [];
            foreach ($row as $key => $value) {
                $weightedRow[$key] = $value * $criteriaWeights[$key];
            }
            $weightedMatrix[] = $weightedRow;
        }

        return $weightedMatrix;
    }

    private function calculatePositiveIdealSolution($weightedMatrix)
    {
        $positiveIdealSolution = [];

        // Looping untuk setiap kolom dalam matriks terbobot
        foreach ($weightedMatrix[0] as $key => $value) {
            $columnValues = [];
            foreach ($weightedMatrix as $row) {
                $columnValues[] = $row[$key];
            }

            // Jika kriteria adalah kriteria dengan nilai maksimum
            if (Kriteria::where('nama_kriteria', $key)->value('tipe') === 'benefit') {
                $positiveIdealSolution[$key] = max($columnValues);
            }
            // Jika kriteria adalah kriteria dengan nilai minimum
            else {
                $positiveIdealSolution[$key] = min($columnValues);
            }
        }

        return $positiveIdealSolution;
    }

    private function calculateNegativeIdealSolution($weightedMatrix)
    {
        $negativeIdealSolution = [];

        // Looping untuk setiap kolom dalam matriks terbobot
        foreach ($weightedMatrix[0] as $key => $value) {
            $columnValues = [];
            foreach ($weightedMatrix as $row) {
                $columnValues[] = $row[$key];
            }

            // Jika kriteria adalah kriteria dengan nilai maksimum
            if (Kriteria::where('nama_kriteria', $key)->value('tipe') === 'benefit') {
                $negativeIdealSolution[$key] = min($columnValues);
            }
            // Jika kriteria adalah kriteria dengan nilai minimum
            else {
                $negativeIdealSolution[$key] = max($columnValues);
            }
        }

        return $negativeIdealSolution;
    }

    private function calculateWeightedDistances($weightedMatrix, $positiveIdealSolution, $negativeIdealSolution)
    {
        // Hitung jarak antara nilai terbobot dan solusi positif
        $positiveDistances = [];
        foreach ($weightedMatrix as $row) {
            $distance = 0;
            foreach ($row as $key => $value) {
                $distance += pow($value - $positiveIdealSolution[$key], 2);
            }
            $positiveDistances[] = sqrt($distance);
        }

        // Hitung jarak antara nilai terbobot dan solusi negatif
        $negativeDistances = [];
        foreach ($weightedMatrix as $row) {
            $distance = 0;
            foreach ($row as $key => $value) {
                $distance += pow($value - $negativeIdealSolution[$key], 2);
            }
            $negativeDistances[] = sqrt($distance);
        }

        return compact('positiveDistances', 'negativeDistances');
    }

    public function calculatePreferences($positiveDistances, $negativeDistances)
    {
        $preferences = [];

        // Hitung nilai preferensi
        foreach ($positiveDistances as $key => $positiveDistance) {
            $negativeDistance = $negativeDistances[$key];
            $preference = $negativeDistance / ($positiveDistance + $negativeDistance);
            $preferences[] = $preference;
        }

        return $preferences;
    }

    public function indexPreferences()
    {
        // Ambil data kafe dari database
        $cafes = Cafe::all();

        // Hitung matriks keputusan
        $decisionMatrix = $this->createDecisionMatrix($cafes);

        // Hitung matriks ternormalisasi
        $normalizedMatrix = $this->calculateNormalizedMatrix($decisionMatrix);

        // Hitung matriks terbobot
        $weightedMatrix = $this->calculateWeightedMatrix($normalizedMatrix);

        // Hitung solusi ideal negatif
        $negativeIdealSolution = $this->calculateNegativeIdealSolution($weightedMatrix);

        // Hitung solusi ideal positif
        $positiveIdealSolution = $this->calculatePositiveIdealSolution($weightedMatrix);

        // Hitung jarak antara nilai terbobot dengan solusi ideal
        $distances = $this->calculateWeightedDistances($weightedMatrix, $positiveIdealSolution, $negativeIdealSolution);

        $positiveDistances = $distances['positiveDistances'];
        $negativeDistances = $distances['negativeDistances'];

        // Hitung nilai preferensi
        $preferences = $this->calculatePreferences($positiveDistances, $negativeDistances);

        // Urutkan kafe berdasarkan nilai preferensi (dari yang tertinggi ke terendah)
        arsort($preferences);

        // Buat array ranking
        $ranking = [];
        $rank = 1;
        foreach ($preferences as $key => $preference) {
            $ranking[$key] = $rank++;
        }

        return view('layouts.preferences', compact('preferences', 'cafes', 'ranking'));
    }
}
