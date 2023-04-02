<!-- End Header Area -->
<!-- Start Banner Area -->
<style>
  select span {
    color: black;
  }

  .register {
    color: red;
  }

  .search_input {
    display: none;
  }

  select {
    font-size: 1rem;
    padding-left: 10px;
    color: #626060;
    border: none;
    border-bottom: 1px solid #cccccc;
  }

  select:focus {
    border: none;
  }

  select option {
    color: black;
  }
</style>
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <h1>Đăng kí</h1>
        <nav class="d-flex align-items-center">
          <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="index.php?act=register">Đăng kí</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
  <div class="container">
    <div class="row justify-content-around">
      <div class="col-lg-6">
        <div class="login_form_inner">
          <h3>ĐĂNG KÍ</h3>
          <h2 class="thongbao"></h2>
          <form class="row login_form pb-3" method="post" enctype="multipart/form-data" id="registrationForm">
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" name="username" placeholder="Tài khoản" value="">
              <span class="mt-3 float-left register" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
              <span class="mt-3 float-left register" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" name="password2" placeholder="Nhập Lại Mật Khẩu">
              <span class="mt-3 float-left register" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <span class="mt-3 float-left register" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" name="phone" placeholder="Phone">
              <span class="mt-3 float-left register" name="register"></span>
            </div>
            <div class="form-group col-md-12">
              <select class="form-select" name="" id="province"></select>
            </div>
            <div class="form-group col-md-12">
              <select class="form-select" name="" id="district">
                <option value="">Chọn quận</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <select class="form-select" name="" id="ward">
                <option value="">Chọn phường</option>
              </select>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="country" name="address" placeholder="Address" value="">
              <span class="mt-3 float-left register" name="register"></span>
              <h2 hidden id="result"></h2>
            </div>
            <div class="col-md-12 form-group">
              <input type="file" class="form-control" name="avatar" placeholder="Avatar">
              <span class="mt-3 float-left register" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <div class="creat_account">
                <input type="checkbox" id="f-option2" name="selector">
                <label for="f-option2">Duy trì đăng nhập</label>
              </div>
            </div>
            <?php
            foreach ($list_user as $user) {
            ?>
              <input type="hidden" name="check_username" value="<?= $user['username'] ?>">
              <input type="hidden" name="check_email" value="<?= $user['email'] ?>">
            <?php
            }
            ?>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" name="registration" class="primary-btn" onclick="return checkForm2()">Đăng kí</button>
              <a href="index.php?act=login">Đã có tài khoản?/Đăng nhập</a>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  // 1. what is API
  // 2. How do I call API
  // 3. Explain code

  const host = "https://provinces.open-api.vn/api/";
  var callAPI = (api) => {
    return axios.get(api)
      .then((response) => {
        renderData(response.data, "province");
      });
  }
  callAPI('https://provinces.open-api.vn/api/?depth=1');
  var callApiDistrict = (api) => {
    return axios.get(api)
      .then((response) => {
        renderData(response.data.districts, "district");
      });
  }
  var callApiWard = (api) => {
    return axios.get(api)
      .then((response) => {
        renderData(response.data.wards, "ward");
      });
  }

  var renderData = (array, select) => {
    let row = ' <option disable value="">Chọn</option>';
    array.forEach(element => {
      row += `<option value="${element.code}">${element.name}</option>`
    });
    document.querySelector("#" + select).innerHTML = row
  }

  $("#province").change(() => {
    callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
    printResult();
    window.onload = printResult();
  });
  $("#district").change(() => {
    callApiWard(host + "d/" + $("#district").val() + "?depth=2");
    printResult();
    window.onload = printResult();
  });
  $("#ward").change(() => {
    printResult();
    window.onload = printResult();
  })

  var printResult = () => {
    let result = $("#ward option:selected").text() + ", " + $("#district option:selected").text() + ", " + $("#province option:selected").text();
    $("#result").text(result)
    const address = document.getElementById("country").value = result;

  }
</script>
</body>

<script>
  let city = document.getElementById("city");
  let district = document.getElementById("district");
  let ward = document.getElementById("ward");
  let address1 = document.getElementById("api_address");
  var search = document.getElementById("country");
  if (city.value != '' && district.value != '' && ward.value != '') {
    search.value = address1.value;
  } else {
    var search = document.getElementById("country");
    async function changeCountry() {
      search.value.trim();
      let apiURL = `http://ip-api.com/json`;
      let data = await fetch(apiURL).then(res => res.json());
      search.value = data.city + ', ' + data.country
    }
    changeCountry();
  }


  function checkForm2() {
    var nodeInput = document.getElementsByTagName("input"); //start 1
    // var nodeSpan = document.getElementsByTagName("span"); //start 9
    var username = document.getElementsByName("check_username");
    var nodeSpan = document.getElementsByName("register");
    var email = document.getElementsByName("check_email");
    for (var i = 0; i < username.length; i++) {
      if (username[i].value == nodeInput[1].value) {
        console.log(username[i].value);
        let checkName = 'Username đã tồn tại';
        alert(checkName);
        // console.log(checkName); 
        nodeInput[1].value = '';
      }
    };


    reguser = /^[a-zA-Z0-9\_]+$/;
    if (nodeInput[1].value == "") {
      nodeSpan[0].innerHTML = "Không được để trống username";
    } else if (nodeInput[1].value.length < 6) {
      nodeSpan[0].innerHTML = 'Nhập ít nhất 6 kí tự';
    } else if (!reguser.test(nodeInput[1].value)) {
      nodeSpan[0].innerHTML = "Chỉ nhập số, chữ cái và _";
    } else {
      nodeSpan[0].innerHTML = "";
    }
    if (nodeInput[2].value == "") {
      nodeSpan[1].innerHTML = "Không được để trống";
    } else {
      nodeSpan[1].innerHTML = "";
    }
    if (nodeInput[3].value == "") {
      nodeSpan[2].innerHTML = "Không được để trống";
    } else if (nodeInput[2].value != nodeInput[3].value) {
      nodeSpan[2].innerHTML = "Mật khẩu không trùng khớp";
    } else {
      nodeSpan[2].innerHTML = "";
    }

    const regMail = /[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,3}/gim;
    if (nodeInput[4].value == "") {
      nodeSpan[3].innerHTML = "Không được để trống";
    } else if (!regMail.test(nodeInput[4].value)) {
      nodeSpan[3].innerHTML = "Sai định dạng email !";
    } else {
      nodeSpan[3].innerHTML = "";
    }
    if (nodeInput[4].value != "") {
      for (var i = 0; i < username.length; i++) {
        if (email[i].value == nodeInput[4].value) {
          console.log(email[i].value);
          let checkName = 'Email đã tồn tại';
          alert(checkName);
          nodeInput[4].value = '';
          break;
        } else {
          checkName = ''
        }
      }
    }
    const regPhone = /^0([0-9]{9})*$/;
    if (nodeInput[5].value == "") {
      nodeSpan[4].innerHTML = "Không được để trống !";
    } else if (nodeInput[5].value.length != 10) {
      nodeSpan[4].innerHTML = "Nhập 10 số!";
    } else if (!regPhone.test(nodeInput[5].value)) {
      nodeSpan[4].innerHTML = "Bắt đầu bằng số 0";
    } else {
      nodeSpan[4].innerHTML = "";
    }
    if (nodeInput[6].value == "") {
      nodeSpan[5].innerHTML = "Không được để trống";
    } else {
      nodeSpan[5].innerHTML = "";
    }
    if (nodeInput[7].value == "") {
      nodeSpan[6].innerHTML = "Không được để trống";
    } else {
      nodeSpan[6].innerHTML = "";
    }
    // action="index.php?act=registration"
    if (nodeInput[1].value != '' && nodeInput[2].value != '' && nodeInput[3].value != '' && nodeInput[4].value != '' && nodeInput[5].value != '' && nodeInput[6].value != '' && nodeInput[7].value != '') {
      // thêm action sau khi validate form
      document.getElementById("registrationForm").setAttribute("action", "index.php?act=registration");
      return true;
    } else {
      document.getElementById("registrationForm").setAttribute("action", "");
      return false;
    }
  }
</script>