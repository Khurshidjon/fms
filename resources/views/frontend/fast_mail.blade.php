@extends('layouts.front_main')
@section('content')
<div class="container" style="margin-top:120px">
<h3 class="text-center font-weight-bold">Tezkor Pochta</h3>
    <div class="row">
      <div class="col-md-4">
          <div class="card p-2" style="width:100%;height:350px"  >
              <img src="{{asset('frontend/img/fast1.jpg')}}" style="width:100%;height:350px;overflow:hidden" alt="">
          </div>
      </div>
      <div class="col-md-8">
          <div class=""  style="width:100%;height:350px ;overflow:hidden" >
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem architecto harum voluptas atque! Repudiandae officiis optio deserunt corrupti vel eveniet, illo nihil? Est illum itaque necessitatibus, impedit ea cum iste.
          Aspernatur natus expedita perspiciatis dicta animi exercitationem dolore? Fuga quaerat doloremque quo quisquam molestiae quis, officiis molestias veritatis deleniti ullam odio, hic, fugiat laborum ipsa aperiam quae unde ratione facilis.
          Facere dicta sapiente molestiae molestias, suscipit illo quia a. Modi itaque, dignissimos optio dicta amet quia sapiente! Impedit doloribus mollitia culpa incidunt aspernatur ipsam ipsa, commodi inventore cupiditate. Maiores, voluptatem.
          Laudantium illum blanditiis fugiat voluptas consectetur aspernatur dolores quas ullam sequi ipsam nostrum doloremque doloribus facere cum culpa similique unde nemo, facilis sunt? Aperiam, maxime fuga totam dolorum beatae accusamus.
          Ipsum non error, dicta, reiciendis magnam earum rerum rem laborum sed nemo ipsam sunt ratione quas alias dolores natus nisi, neque voluptatem! Voluptatibus delectus minus aliquam exercitationem provident magni ducimus.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit repellendus illo nisi dolorem inventore fugiat earum sint distinctio praesentium nemo ab, libero facere eligendi molestiae architecto officia unde esse quia!Nam a pariatur ratione totam facilis consequatur officiis enim provident rerum nesciunt, veniam sed, voluptate quidem tempora architecto asperiores! Nesciunt non dolore commodi corrupti iusto provident aspernatur odio nobis minus!
     </p>
          </div>
      </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <h6 class="text-uppercase font-weight-bold" >KURYER CHAQIRISH:</h6 class="text-uppercase font-weight-bold" >
            <p><a href="tel:+99894 123 45 67"><i>+998 94 123 45 67</i></a></p>
            <p><a href="tel:+99894 123 45 67"><i>+998 94 123 45 67</i></a></p>
            <p><a href="tel:+99894 123 45 67"><i>+998 94 123 45 67</i></a></p>
        </div>
        <div class="col-md-3">
            <h6 class="text-uppercase font-weight-bold" >Ma'lumot Uchun</h6 class="text-uppercase font-weight-bold" >
            <p><a href="tel:+99894 123 45 67"><i>+998 94 123 45 67</i></a></p>
            <p><a href="tel:+99894 123 45 67"><i>+998 94 123 45 67</i></a></p>
        </div>
        <div class="col-md-3">
            <h6 class="text-uppercase font-weight-bold" >Shikoyat va arizalar uchun</h6 class="text-uppercase font-weight-bold" >
            <p><a href="tel:+99894 123 45 67"><i>+998 94 123 45 67</i></a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box1 p-5">
            <form>
              <div class="row">
                    <div class=" col-md-6 form-group">
                    <label for="exampleFormControlSelect1">Qaysi shaxardan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleFormControlSelect1">Qaysi shaxarga</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                </div>
              </div>
                <div class="row pl-4 ">
                <div class="col-md-6 form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Kuryer Chaqirish</label>
                </div>
                <div class="col-md-6 form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Yetkazib berish</label>
                </div>
                </div>
                <div class="row">
                    <div class=" col-md-6 form-group">
                    <label for="exampleInputEmail1">Og'iligi</label>
                    <input type="number" class="form-control" >
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Hajmi</label>
                    <input type="number" class="form-control" >
                </div>
              </div>
                <div class="text-center"><button type="submit" style="background-color:#ff5e00;" class="text-center btn btn text-white">Submit</button></div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection