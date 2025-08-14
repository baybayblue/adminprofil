<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::table('profil_sekolahs', function (Blueprint $table) {
                $table->text('jam_operasional')->nullable()->after('youtube_url');
                $table->string('foto_gedung')->nullable()->after('jam_operasional');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('profil_sekolahs', function (Blueprint $table) {
                $table->dropColumn(['jam_operasional', 'foto_gedung']);
            });
        }
    };