<div class="container-fluid" style="background-color:aliceblue" >
    <footer>
        
        <div class="d-flex justify-content-evenly row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 border-top mx-auto">
            
            <div class="col mb-3">
            <h5>Contact info</h5>
            <p>
            (031) 99141069<br>
            0811-320564 (Mr Sugianto)<br>
            0811-335203 (Mr Irwan)<br>
            contactus.casa@gmail.com<br>
            </p>
            </div>
        
            <div class="col text-center mb-3">
                <h5>Navigation</h5>

                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{route('daftarproduk')}}" class="footer-link nav-link p-0 text-muted">Produk</a></li>
                    @if(Auth::user()->isAdmin())
                    <li class="nav-item mb-2"><a href="{{route('daftarbrand')}}" class="footer-link nav-link p-0 text-muted">Brand</a></li>
                    <li class="nav-item mb-2"><a href="{{route('daftarcategory')}}" class="footer-link nav-link p-0 text-muted">Kategori</a></li>
                    <li class="nav-item mb-2"><a href="{{route('kirimtransaksi')}}" class="footer-link nav-link p-0 text-muted">Send Transaction</a></li>
                    @endif
                    <li class="nav-item mb-2"><a href="{{route('berita')}}" class="footer-link nav-link p-0 text-muted">Berita</a></li>
                    <li class="nav-item mb-2"><a href="{{route('contact')}}" class="footer-link nav-link p-0 text-muted">Kontak</a></li>
                </ul>
            </div>
        </div>
        <div class="col mb-3 text-center py-1 ">
                <p>Copyright 2023</p>
            </div>

    </footer>
    
</div>