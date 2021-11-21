function addProductToPage() {

  let currentCountProduct = document.getElementsByClassName('product').length;

  fetch('/getProducts.php', {
    method: 'POST',
    body: `${currentCountProduct}`
  })
    .then(response => response.json())
    .then(function (arrayProducts) {

      for (let i = 0; i < arrayProducts.length; i++) {

        let div = document.createElement('div');
        div.classList.add('product')
        div.innerHTML = `<h3>${arrayProducts[i].title}</h3><p>${arrayProducts[i].description}</p>`
        document.getElementById('products').append(div);
      }

    });
}
window.onload = () => {
  addProductToPage();
  let btn = document.getElementById('products_btn');
  btn.addEventListener("click" ,() => addProductToPage());
};