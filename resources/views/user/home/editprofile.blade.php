@extends('user.layouts')

@section('title', 'TukuTiket')

@section('content')
<div class="register-login-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="register-form">
            <h2 class="text-center">Edit Profil Anda</h2>
            <form action="userprofile.html">

              <!-- Uploaded image area-->
              <p class="text-center">Foto Profil</p>
              <img id="imageResult" src="img/profilepic/rizki.jpg" alt="" class="profilepic rounded-circle mx-auto d-block">
              <div class="input-group mb-3 mt-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="upload" aria-describedby="inputGroupFileAddon01" onchange="this.nextElementSibling.innerText = this.files[0].name; readURL(this);">
                  <label class="custom-file-label" for="inputGroupFile01"><span class="fas fa-cloud-upload-alt"></span> Ukuran Maks. 100gb</label>
                </div>
              </div>


              <!-- <div class="group-input">
                <label><span class="fas fa-user-lock"></span> Username</label>
                <p>@rizkiimoet</p>
              </div> -->
              <div class="group-input">
                <label for="namadepan"><span class="fas fa-signature"></span> Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Nama Lengkap">
              </div>
              
              <div class="group-input">
                <label for="pekerjaan"><span class="fas fa-money-check"></span> Jenis Kelamin</label>
                <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Jenis Kelamin">
              </div>
              <!-- <div class="group-input">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque alias quam minus culpa laudantium in rem, blanditiis dolorem, incidunt possimus fugit tempora. Blanditiis molestias magnam odit reprehenderit cum eius neque?</textarea>
              </div> -->


              <button type="submit" class="site-btn login-btn"><span class="fas fa-edit"></span> perbarui profil</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection