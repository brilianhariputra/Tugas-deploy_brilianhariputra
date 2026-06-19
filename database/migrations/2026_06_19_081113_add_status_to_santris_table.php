public function up(): void
{
    Schema::table('santris', function (Blueprint $table) {
        // Cek dulu apakah kolom 'status' belum ada, baru ditambahkan
        if (!Schema::hasColumn('santris', 'status')) {
            $table->string('status')->default('Hadir');
        }
    });
}