<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Surat;

class SuratFactory extends Factory
{
    protected $model = Surat::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'no_pendaftar' => $this->faker->unique()->numerify('########'),
            'nik' => $this->faker->numerify('############'),
            'nama_pengantar_kerja' => $this->faker->name,
            'nama_ibu' => $this->faker->name,
            'nama_lengkap' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'jenis_kelamin' => $this->faker->randomElement(['LAKI-LAKI', 'PEREMPUAN']),
            'status' => $this->faker->randomElement(['Single', 'Married', 'Divorced']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
            'tinggi_badan' => $this->faker->numberBetween(150, 200),
            'berat_badan' => $this->faker->numberBetween(40, 150),
            'jln' => $this->faker->streetName,
            'rtrw' => $this->faker->numerify('###/###'),
            'kel' => $this->faker->citySuffix,
            'kec' => $this->faker->city,
            'kab' => $this->faker->state,
            'provinsi' => $this->faker->state,
            'pos' => $this->faker->randomNumber(5),
            'telp' => $this->faker->numerify('############'),
            'email' => $this->faker->email,
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'jurusan' => $this->faker->word,
            'keterampilan' => $this->faker->sentence,
            'tahun_lulus' => $this->faker->year,
            'sd_tahun' => $this->faker->optional()->year,
            'smp_tahun' => $this->faker->optional()->year,
            'sma_tahun' => $this->faker->optional()->year,
            'jabatan_1' => $this->faker->optional()->jobTitle,
            'uraian_tugas_1' => $this->faker->optional()->sentence,
            'lama_kerja_1' => $this->faker->optional()->numberBetween(1, 10),
            'pemberi_kerja_1' => $this->faker->optional()->company,
            'jabatan_2' => $this->faker->optional()->jobTitle,
            'uraian_tugas_2' => $this->faker->optional()->sentence,
            'lama_kerja_2' => $this->faker->optional()->numberBetween(1, 10),
            'pemberi_kerja_2' => $this->faker->optional()->company,
            'jabatan_dalam_negeri' => $this->faker->optional()->jobTitle,
            'jabatan_luar_negeri' => $this->faker->optional()->jobTitle,
            'upah_yang_diinginkan' => $this->faker->randomNumber(5),
            'bahasa_asing' => $this->faker->optional()->languageCode,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
