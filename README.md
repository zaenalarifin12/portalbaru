# step by step

    table
        == master ==
        users 
            id
            nama
            no_hp
            password
            role
            nik
            alamat
            rt
            rw
            kecamatan
            kabupaten
            nama_ketua_kelompok
            tahun_tanam
            jumlah_paket
            nomor_rekening
        
        informasi
            content

        produk
            nama
            gambar
            harga

        great
            nama

        daftar_penjualan
            jumlah bal
            pembayaran
            user_id
            status [sudah, belum]

        == transaksi ==
        cart_produk
            id
            user_id
        
        cart_detail
            id
            cart_id
            produk_id
            jumlah

        order_produk
            id
            cart_id
            total
            pembayaran
            struk
            status order [terkirim, belum]
        
        order_detail
            id
            order_id
            produk_id
            jumlah

        == transaksi penjualan
        hasil_penjualan
            daftar_penjualan_id
            total

        laku_detail
            id
            jumlah
            great
            total
            hasil_penjualan_id

        tidak laku detail
            id
            jumlah
            alasan
            hasil_penjualan_id