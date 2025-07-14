<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentsImport implements ToCollection
{
    protected $generation;

    public function __construct($generation)
    {
        $this->generation = $generation;
    }

    public function collection(Collection $row)
    {
        foreach ($row as $key => $student) {
            if ($key === 0) continue;

            Student::create([
                'name' => $student[0],
                'nis' => $student[1],
                'nisn' => $student[2],
                'gender' => strtolower($student[3]),
                'major' => strtolower($student[4]),
                'generation' => $this->generation
            ]);
        }
    }
}
