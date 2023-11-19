$( '#multiple-select-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
} );
// const selectBtn = document.querySelector(".select-btn"),
//       items = document.querySelectorAll(".item");

// selectBtn.addEventListener("click", () => {
//     selectBtn.classList.toggle("open");
// });

// items.forEach(item => {
//     item.addEventListener("click", () => {
//         item.classList.toggle("checked");

//         let checked = document.querySelectorAll(".checked"),
//             btnText = document.querySelector(".btn-text");

//             if(checked && checked.length > 0){
//                 btnText.innerText = `${checked.length} Selected`;
//             }else{
//                 btnText.innerText = "Select Language";
//             }
//     });
// })

// const optionMenu = document.querySelector(".select-menu"),
//        selectBtn = optionMenu.querySelector(".select-btn"),
//        options = optionMenu.querySelectorAll(".option"),
//        sBtn_text = optionMenu.querySelector(".sBtn-text");

// selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));       

// options.forEach(option =>{
//     option.addEventListener("click", ()=>{
//         let selectedOption = option.querySelector(".option-text").innerText;
//         sBtn_text.innerText = selectedOption;

//         optionMenu.classList.remove("active");
//     })
// })
// const optionMenu2 = document.querySelector(".select-menu.dua"),
//        selectBtn2 = optionMenu2.querySelector(".select-btn.dua"),
//        options2 = optionMenu2.querySelectorAll(".option.dua"),
//        sBtn_text2 = optionMenu2.querySelector(".sBtn-text.dua");

// selectBtn2.addEventListener("click", () => optionMenu2.classList.toggle("active"));       

// options2.forEach(option =>{
//     option.addEventListener("click", ()=>{
//         let selectedOption2 = option.querySelector(".option-text.dua").innerText;
//         sBtn_text2.innerText = selectedOption2;

//         optionMenu2.classList.remove("active");
//     })
// })
// const optionMenu3 = document.querySelector(".select-menu.tiga"),
//        selectBtn3 = optionMenu3.querySelector(".select-btn.tiga"),
//        options3 = optionMenu3.querySelectorAll(".option.tiga"),
//        sBtn_text3 = optionMenu3.querySelector(".sBtn-text.tiga");

// selectBtn3.addEventListener("click", () => optionMenu3.classList.toggle("active"));       

// options3.forEach(option =>{
//     option.addEventListener("click", ()=>{
//         let selectedOption3 = option.querySelector(".option-text.tiga").innerText;
//         sBtn_text3.innerText = selectedOption3;

//         optionMenu3.classList.remove("active");
//     })
// })
// const optionMenu4 = document.querySelector(".select-menu.empat"),
//        selectBtn4 = optionMenu4.querySelector(".select-btn.empat"),
//        options4 = optionMenu4.querySelectorAll(".option.empat"),
//        sBtn_text4 = optionMenu4.querySelector(".sBtn-text.empat");

// selectBtn4.addEventListener("click", () => optionMenu4.classList.toggle("active"));       

// options4.forEach(option =>{
//     option.addEventListener("click", ()=>{
//         let selectedOption4 = option.querySelector(".option-text.empat").innerText;
//         sBtn_text4.innerText = selectedOption4;

//         optionMenu4.classList.remove("active");
//     })
// })
// const optionMenu5 = document.querySelector(".select-menu.lima"),
//        selectBtn5 = optionMenu5.querySelector(".select-btn.lima"),
//        options5 = optionMenu5.querySelectorAll(".option.lima"),
//        sBtn_text5 = optionMenu5.querySelector(".sBtn-text.lima");

// selectBtn5.addEventListener("click", () => optionMenu5.classList.toggle("active"));       

// options5.forEach(option =>{
//     option.addEventListener("click", ()=>{
//         let selectedOption5 = option.querySelector(".option-text.lima").innerText;
//         sBtn_text5.innerText = selectedOption5;

//         optionMenu5.classList.remove("active");
//     })
// })