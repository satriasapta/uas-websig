<div class="content-padder content-background">
    <div class="uk-section-small uk-section-default header">
        <div class="uk-container uk-container-large">
            <h2><span class="ion-speedometer"></span> Beranda</h2>
            <p>
                Selamat Datang, <?= $this->session->userdata('nama') ?>, <?= $judul ?>
            </p>
        </div>
    </div>
    <div class="uk-section-small">
        <div class="uk-container uk-container-large">
            <div id="mapid"></div>
        </div>
    </div>


    <script type="text/javascript">
        var data = [
            <?php
            foreach ($transportasi as $key => $r) { ?> {
                    "lokasi": [<?= $r->latitudeTransportasi ?>, <?= $r->longitudeTransportasi ?>],
                    "kecamatan": "<?= $r->provinsiTransportasi ?>",
                    "keterangan": "<?= $r->keteranganTransportasi ?>",
                    "tempat": "<?= $r->lokasiTransportasi ?>",
                    "kategori": "<?= $r->kategoriTransportasi ?>"
                },
            <?php } ?>
        ];

        var map = new L.Map('mapid', {
            zoom: 10,
            center: new L.latLng(-5.372065, 105.266776)
        });
        map.addLayer(new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }));

        var markersLayer = new L.LayerGroup();
        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            initial: false,
            zoom: 25,
            marker: false
        });

        map.addControl(new L.Control.Search({

            layer: markersLayer,
            initial: false,
            collapsed: true,
        }));

        var kereta = L.icon({
            iconUrl: '<?= base_url('public/icon/train.png') ?>',
            iconSize: [50, 50]
        });

        var busstop = L.icon({
            iconUrl: '<?= base_url('public/icon/busstop.png') ?>',
            iconSize: [50, 50]
        });
        var bus = L.icon({
            iconUrl: '<?= base_url('public/icon/bus.png') ?>',
            iconSize: [50, 50]
        });




        var icons = "";
        for (i in data) {
            var kecamatan = data[i].kecamatan;
            var lokasi = data[i].lokasi;
            var tempat = data[i].tempat;
            var keterangan = data[i].keterangan;
            var kategori = data[i].kategori;

            if (kategori == "busstop") {
                icons = busstop;
            } else if (kategori == "transportasi") {
                icons = bus;
            } else if (kategori == "kereta") {
                icons = kereta;
            }

            var marker = new L.Marker(new L.latLng(lokasi), {
                title: kecamatan,
                icon: icons
            });
            marker.bindPopup('<b>Kecamatan: ' + kecamatan + ' <br> Lokasi: ' + tempat + '<br> Keterangan: ' + keterangan + '</b>');
            markersLayer.addLayer(marker);
        }
    </script>