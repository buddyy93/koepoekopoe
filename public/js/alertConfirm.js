function confirmDelete(itemId, name) {
    var baseUrl = "http://www.koepoekoepoe.com/new/";
    var method = null;

    if (name === 'produk') {
        method = "manage_produk/deleteProduk/";
    }
    else if (name === 'resep') {
        method = "manage_resep/deleteResep/";
    }
    else if (name === 'story') {
        method = "manage_story/deleteStory/";
    }
    else if (name === 'kategoriproduk') {
        method = "manage_kategori_produk/deleteKategoriProduk/";
    }
    else if (name === 'kategoriresep') {
        method = "manage_kategori_resep/deleteKategoriResep/";
    }
    else if (name === 'kategoristory') {
        method = "manage_kategori_story/deleteKategoriStory/";
    }
    else if (name === 'slider') {
        method = "manage_slider/deleteKategoriSlider/";
    }
    else if (name === 'brand') {
        method = "manage_brand/deleteBrand/";
    }
    else if (name === 'menumanager') {
        method = "manage_menumanager/deletemenumanager/";
    }
    else if (name === 'account') {
        method = "manage_account/deleteaccount/";
    }

    alertify.confirm("Apakah anda yakin ingin menghapus data ini?", function (e) {
        if (e) {
            if(name !== null)
            window.location.href = baseUrl + method + itemId;
        }
    }).setHeader('Notification');
}