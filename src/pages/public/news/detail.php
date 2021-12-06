<?php include __DIR__ . '/../Header.php' ?>

<div class="container">
    <div class="row">

        <!------- Main Content ------->
        <div class="col-md-8 top-1 start-0 mt-3">
            <div class="card rounded p-3" style="border-top: 5px solid red;">
                <h4 class="ps-3">Judul Berita</h4>
                <span class="text-muted ps-3" style="font-size: 12px;">1 Des 2021 | Admin | <a href="" class="text-muted"> Contoh</a></span>
                <div class="px-3 pt-4">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur perspiciatis maxime unde fugit cupiditate enim. Est provident quam similique culpa. Libero sapiente quam hic architecto quos harum perspiciatis minus porro voluptatum? Doloremque, culpa rem. Ratione laudantium accusamus quo quasi aperiam illum illo officiis a doloribus praesentium, maxime quidem, at ex cupiditate repellendus obcaecati atque doloremque quia quibusdam deserunt ipsam temporibus fugit laborum. Minus ratione alias omnis reprehenderit labore a itaque esse recusandae at quos. Assumenda totam eveniet vel quam dolorum, blanditiis sit excepturi culpa vitae nobis quidem cumque porro perferendis soluta dignissimos commodi dolores perspiciatis voluptates reiciendis, tenetur ea odio.</p>
                    <span class="badge bg-danger">Opini suara & publik</span>
                    <span class="badge bg-danger">Public Government</span>
                </div>
            </div>
            <div class="card my-2 p-4">
                <textarea class="form-control" rows="5" placeholder="Silahkan tuliskan komentarmu...."></textarea>
                <div class="d-flex flex-row-reverse">
                    <button class="btn btn-danger rounded mt-3">Kirim</button>
                </div>
            </div>
            <div class="card my-2 p-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-semua" role="tab">Semua Komentar</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-populer" role="tab">Terpopuler</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-terbaru" role="tab">Terbaru</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-terdahulu" role="tab">Terdahulu</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active p-3" id="nav-semua" role="tabpanel">
                        <span>2 Komentar</span>
                        <div class="row my-3">
                            <div class="col-sm-2">
                                <img src="https://awsimages.detik.net.id/community/media/visual/2019/09/25/f970f73a-2f96-47f0-9de8-70ba736a287f.jpeg?w=750&q=90" class="rounded-circle" width="80px">
                            </div>
                            <div class="col-sm-9">
                                <div class="d-flex">
                                    <h6>Johan Yudiono</h6>
                                    <span class="text-muted ps-3" style="font-size: 13px;">2 Bulan yang lalu</span>
                                </div>
                                <p class="text-grey">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                    erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                    tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                </p>
                                <span class="pe-2 text-lightgrey"><i class="far fa-thumbs-up"></i>2k</span>
                                <span class="pe-2 text-lightgrey"><i class="far fa-thumbs-down"></i></i>50</span>
                                <span class="pe-2 text-lightgrey"><i class="far fa-comment"></i>1</span>
                                <div class="card shadow my-2 p-2">
                                    <span>Balasan</span>
                                    <div class="row my-3">
                                        <div class="col-sm-3">
                                            <img src="https://awsimages.detik.net.id/community/media/visual/2019/09/25/f970f73a-2f96-47f0-9de8-70ba736a287f.jpeg?w=750&q=90" class="rounded-circle" width="80px">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="d-flex">
                                                <h6>Johan Yudiono</h6>
                                                <span class="text-muted ps-3" style="font-size: 13px;">2 Bulan yang lalu</span>
                                            </div>
                                            <p class="text-grey">
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                                tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            </p>
                                            <span class="pe-2 text-lightgrey"><i class="far fa-thumbs-up"></i>2k</span>
                                            <span class="pe-2 text-lightgrey"><i class="far fa-thumbs-down"></i></i>50</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-populer" role="tabpanel">
                        <h4>Komentar Populer</h4>
                    </div>
                    <div class="tab-pane fade" id="nav-terbaru" role="tabpanel">
                        <h4>Komentar Terbaru</h4>
                    </div>
                </div>
            </div>

        </div>


        <!------- Side Content ------->
        <div class="col-md-4 py-3 pe-4">
            <div class="row d-flex align-items-center">

                <!------- Trending ------->
                <div class="card mb-4">
                    <div class="card-header" style="background-color: white;padding: 5px 0 5px 0;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 style="border-left: 5px solid red;padding-left: 15px;">Trending</h5>
                            <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body" style="height: 460px;overflow-y:scroll;padding: 0;">
                        <!-- start content -->
                        <div class="side-news-item">
                            <div class="d-flex">
                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;">WHO Ungkap Strategi India Sukses Tangani Tsunami Corona: Berani Lockdown</h6>
                                <div class="side-trending-image" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1618899920/t9jgmld9fd9mwqwvhdq2.jpg);background-size: cover;background-position: top center;"></div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <span>50 menit</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Button trigger modal -->
                                            <button class="btn text-dark" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start content -->
                        <!-- start content -->
                        <div class="side-news-item">
                            <div class="d-flex">
                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;">BREAKING NEWS: Corona di Indonesia Menggila, Melonjak 20.574 Orang Sehari</h6>
                                <div class="side-trending-image" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1579862421/jaytgvbgn9gwzyvburtb.jpg);background-size: cover;background-position: top center;"></div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <span>50 menit</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Button trigger modal -->
                                            <button class="btn text-dark" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start content -->
                        <!-- start content -->
                        <div class="side-news-item">
                            <div class="d-flex">
                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;">Kapal Perang Rusia Serang Kapal Inggris yang Masuk Perairan Crimea</h6>
                                <div class="side-trending-image" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1624511580/obm9melj25hcea0oeiwl.jpg);background-size: cover;background-position: top center;"></div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <span>50 menit</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Button trigger modal -->
                                            <button class="btn text-dark" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start content -->
                        <!-- start content -->
                        <div class="side-news-item">
                            <div class="d-flex">
                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;">Kapal Perang Rusia Serang Kapal Inggris yang Masuk Perairan Crimea</h6>
                                <div class="side-trending-image" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1624511580/obm9melj25hcea0oeiwl.jpg);background-size: cover;background-position: top center;"></div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <span>50 menit</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Button trigger modal -->
                                            <button class="btn text-dark" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start content -->
                    </div>
                </div>

                <!------- Category ------->
                <div class="card">
                    <div class="card-body">
                        <div style="background-color: white;padding: 5px 0 5px 0;">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Kategori</h5>
                            </div>
                            <hr>
                        </div>
                        <ul class="nav flex-column" style="font-size: 14px;">
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Politics</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">International</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Finance</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Health care</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Technology</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Jobs</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Media</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Administration</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Sports</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Game</a></li>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="#">Art</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-dark" href="#">Kids</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<?php include __DIR__ . '/../Footer.php' ?>