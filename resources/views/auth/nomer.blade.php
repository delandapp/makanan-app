<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input:invalid + span:after {
  position: absolute;
  content: "✖";
  padding-left: 1rem;
  color: #d9534f;
  font-size: 2rem;
  line-height: 54px;
}

input:valid + span:after {
  position: absolute;
  content: "✓";
  padding-left: 1rem;
  color: #5cb85c;
  font-size: 2rem;
  line-height: 54px;
}

#phone {
  width: calc(100% - 2.5rem);
  padding: 1rem;
  font-family: Poppins, sans-serif;
  font-size: 1rem;
  letter-spacing: 0.05rem;
  color: var(--primary-color);
  background-color: var(--primary-bg-color);
  border: 2px solid var(--secondary-color);
  background-image: none;
  border-radius: 5px;
  outline: none;  
  box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  transition: all .2s
}

#phone:focus {
  outline: 0;
}

#phone:valid {
  border-color: #3c763d78;
}

#phone:focus:invalid {
  border-color: rgb(217 83 79 / 60%);
}

.btn {
  width: 100%;
  font-size: 1rem;
  letter-spacing: 0.1rem;
  font-weight: 600;
  padding: 1rem 0;
  background-color: #112E4F;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  display: -moz-box;
  display: flex;
  -moz-box-align: center;
  align-items: center;
  -moz-box-pack: center;
  justify-content: center;
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  transition: all .2s
}

.btn:active {
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}

small {
  color: var(--gray-300);
  margin-top: 1rem;
  margin-bottom: 2rem;
  display: block;
  font-size: 0.875rem;
}

.content {
	background-color: white;	
  padding: 2.5rem;
  border-radius: 0.5rem;
  max-width: 32rem;
  margin: 2rem auto;
}
#label {
  margin-top: 0;
  margin-bottom: 2rem;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
          <form action="" method="POST">
            @csrf
            <p id="label" class="large-text">Enter your phone number:</p>
            <input 
              id="phone" 
              type="number" 
              required 
              name="handphone"
              placeholder="xxx-xxx-xxxx" />
            <span class="validity"></span>
            <small class="small-text">Format: 123-456-7890</small>
            <input type="submit" class="btn" value="VERIFY" />
          </form>
        </div>  
    </div>
</body>
<script>
    window.onload = function() {
  document.getElementById("phone").focus();
}
</script>
</html>