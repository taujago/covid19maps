-------------------------------------
*ALAT ANGKUTAN APUNG BERMOTOR KHUSUS*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_ALAT_ANGKUTAN AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALAT ANGKUTAN APUNG BERMOTOR KHUSUS'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALAT ANGKUTAN APUNG BERMOTOR KHUSUS') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG;

-------------------------------------
*ALAT ANGKUTAN BERMOTOR UDARA*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_ALAT_ANGKUTAN AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALAT ANGKUTAN BERMOTOR UDARA'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALAT ANGKUTAN BERMOTOR UDARA') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG;


-------------------------------------
*ALAT DALMAS/ALAT DAKHURA*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALAT DALMAS/ALAT DAKHURA'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALAT DALMAS/ALAT DAKHURA') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG;


-------------------------------------
*ALAT KOMUNIKASI KHUSUS*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALAT KOMUNIKASI KHUSUS') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*ALAT NUKLIR, BIOLOGI DAN KIMIA*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALAT NUKLIR, BIOLOGI DAN KIMIA'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALAT NUKLIR, BIOLOGI DAN KIMIA') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG


-------------------------------------
*ALAT PENJINAK BAHAN PELEDAK (ALJIHANDAK)*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALAT PENJINAK BAHAN PELEDAK (ALJIHANDAK)'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALAT PENJINAK BAHAN PELEDAK (ALJIHANDAK)') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*ALAT PERSENJATAAN*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALAT PERSENJATAAN'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALAT PERSENJATAAN') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*ALAT WANTEROR (PERLAWANAN TEROR)*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALAT WANTEROR (PERLAWANAN TEROR)'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALAT WANTEROR (PERLAWANAN TEROR)') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG


-------------------------------------
*ALSUS DAKTILOSKOPI*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALSUS DAKTILOSKOPI'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALSUS DAKTILOSKOPI') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*ALSUS FOTOGRAFI KEPOLISIAN*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALSUS FOTOGRAFI KEPOLISIAN'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALSUS FOTOGRAFI KEPOLISIAN') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*ALSUS LANTAS*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALSUS LANTAS'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALSUS LANTAS') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*ALSUS RESERSE*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='ALSUS RESERSE'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='ALSUS RESERSE') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*INSTRUMEN ANALISIS LAB FORENSIK*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='INSTRUMEN ANALISIS LAB FORENSIK'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='INSTRUMEN ANALISIS LAB FORENSIK') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*KENDARAAN BERMOTOR KHUSUS DARAT*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_ALAT_ANGKUTAN AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='KENDARAAN BERMOTOR KHUSUS DARAT'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='KENDARAAN BERMOTOR KHUSUS DARAT') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG

-------------------------------------
*PERALATAN DETEKSI INTEL*
-------------------------------------
SELECT AST.KODE_BARANG,AST.NAMA_BARANG,SUM(AST.BB) BB,SUM(AST.RR) RR,SUM(AST.RB) RB, SUM(AST.BB+AST.RR+AST.RB) JML
FROM (SELECT RS.KD_BRG KODE_BARANG,RS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RS 
			LEFT JOIN t_ASET_SENJATA AAA ON RS.KD_BRG=AAA.KODE_BARANG 
			WHERE RS.KEL_ALUTSITA='PERALATAN DETEKSI INTEL'
			UNION
			SELECT RSS.KD_BRG KODE_BARANG,RSS.NM_BRG NAMA_BARANG,
         CASE WHEN UPPER(APM.KONDISI)='BAIK' THEN 1 ELSE 0 END AS BB, 
         CASE WHEN UPPER(APM.KONDISI)='RUSAK BERAT' THEN 1 ELSE 0 END AS RB,
			   CASE WHEN UPPER(APM.KONDISI)='RUSAK RINGAN' THEN 1 ELSE 0 END AS RR
			FROM t_REF_SUBSUBKELOMPOK RSS 
			LEFT JOIN t_ASET_PM_NON_TIK APM ON RSS.KD_BRG=APM.KODE_BARANG 
			WHERE RSS.KEL_ALUTSITA='PERALATAN DETEKSI INTEL') AST
GROUP BY AST.KODE_BARANG
ORDER BY AST.KODE_BARANG