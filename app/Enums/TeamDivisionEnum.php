<?php

namespace App\Enums;

enum TeamDivisionEnum: string
{
    case KETUA = 'Ketua Satgas';
    case SEKRETARIS = 'Sekretaris Satgas';
    case INTERVENSI = 'Anggota Divisi Intervensi';
    case ADVOKASI = 'Anggota Divisi Advokasi';
    case PREVENSI = 'Anggota Divisi Prevensi';
    case GUARDIAN = 'Anggota The Guardian';
    case DUTA = 'Anggota Duta';
    case VOLUNTEER = 'Anggota Volunteer';
}