loadcart();
loadwishlist();
var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//loadcart
function loadcart() {
    fetch('/load-cart-data', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrf_token
        }
    })
    .then(response => response.json())
    .then(response => {
        document.querySelector('.cart-count').innerHTML = '';
        document.querySelector('.cart-count').innerHTML = response.count;
    })
    .catch(error => console.error(error));
}

//loadWishlist
function loadwishlist() {
    fetch('/load-wishlist-count', {
        method: 'GET', 
        headers: {
            'X-CSRF-TOKEN': csrf_token
        }
      })
      .then(function (response) {
        return response.json();
      })
      .then(function (response) {
        document.querySelector('.wishlist-count').innerHTML = '';
        document.querySelector('.wishlist-count').innerHTML = response.count;
      })
      .catch(function (error) {
        console.error(error);
      });
}

document.querySelectorAll('.decrement-btn').forEach(function(element) {
    element.addEventListener('click', function(e) {
      e.preventDefault();
  
      var decValue = this.closest('.product_data').querySelector('.qty-input').value;
      var value = parseInt(decValue, 10);
      value = isNaN(value) ? 0 : value;
      if (value > 1) {
          value--;
          this.closest('.product_data').querySelector('.qty-input').value = value;
      }
    });
});

document.querySelectorAll('.increment-btn').forEach(function(element) {
    element.addEventListener('click', function(e) {
        e.preventDefault();
        var incValue = this.closest('.product_data').querySelector('.qty-input').value;
        var value = parseInt(incValue, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        this.closest('.product_data').querySelector('.qty-input').value = value;
    });
});

document.querySelectorAll('.changeQuantity').forEach(function(element) {
    element.addEventListener('click', function(e) {
      e.preventDefault();
  
      var prod_id = this.closest('.product_data').querySelector('.prod_id').value;
      var qty = this.closest('.product_data').querySelector('.qty-input').value;
      fetch("update-cart?prod_id="+prod_id+'&prod_qty='+qty, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf_token
            }
        })
        .then(response => response.json())
        .then(function (response) {
            swal("", response.status, "success");
        });
    });
});

document.querySelectorAll('.addToCartBtn').forEach(function(element) {
        element.addEventListener('click', function(e) {
        e.preventDefault();
        var product_id = document.querySelector('.prod_id').value;
        var product_qty = document.querySelector('.qty-input').value;

        fetch('/add-to-cart?product_id='+product_id+'&product_qty='+product_qty, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        })
        .then((response) => response.json())
        .then((response) => {
            if(response.status == 'Login to continue'){
                window.location.href = '/login';
            }
            else{
                swal(response.status);
                loadcart();
            }
        })
        .catch(error => console.error(error))
        });
    });

document.querySelectorAll('.delete-cart-item').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            var prod = this.closest('.product_data');
            var prod_id = prod.querySelector('.prod_id').value;
            fetch("delete-cart-item?prod_id="+prod_id, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrf_token
                }
            })
            .then(response => response.json())
            .then(function (response) {
                loadcart();
                prod.remove();
                swal("", response.status, "success");
            });
        });
    });

document.querySelectorAll('.remove-wishlist-item').forEach(function(element) {
    element.addEventListener('click', function(e) {
        e.preventDefault();
        
        let prod = e.target.closest('.product_data');
        let prod_id = prod.querySelector('.prod_id').value;
    
        fetch('delete-wishlist-item?prod_id='+prod_id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf_token
        }
        })
        .then(res => res.json())
        .then(response => {
        loadwishlist();
        prod.remove();
        swal("", response.status, "success");
        });
    });
});

if (document.querySelector('.addToWishlist') != null) {
    document.querySelector('.addToWishlist').addEventListener('click', function (e){
        e.preventDefault();
        var product_id = document.querySelector('.prod_id').value;

        fetch('/add-to-wishlist?product_id='+product_id, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (response) {
            if(response.status == 'Login to continue'){
                window.location.href = '/login';
            }
            else
            {
                swal(response.status);
                loadwishlist();
            }
        })
        .catch(function (error) {
            console.error(error);
        });  
    });
}

if(document.querySelector('.rating-modal-cancel') != null){
    document.querySelector('.rating-modal-cancel').addEventListener('click', function (e){
        e.preventDefault();
        document.querySelector('.rating-modal').style.visibility  = 'hidden';
    });
}

if(document.querySelector('.rate-this-product') != null){
    document.querySelector('.rate-this-product').addEventListener('click', function (e){
        e.preventDefault();
        document.querySelector('.rating-modal').style.visibility  = 'visible';
    });
}

if(document.querySelector('.btn-add-update-review') != null){
    document.querySelector('.btn-add-update-review').addEventListener('click', function (e){
        var product_id, review_id, form_review;
        if(document.querySelector('.product_id') != null){
            product_id = document.querySelector('.product_id').value;
        }

        if(document.querySelector('.review_id') != null){
            review_id = document.querySelector('.review_id').value;
        }

        if(document.querySelector('.form-review') != null){
            form_review = document.querySelector('.form-review').value;
            if(form_review == null || form_review == ""){
                swal("Please enter your review");
                return;
            }
        }

        if(product_id != null){
            fetch('/add-review?product_id='+product_id+'&user_review='+form_review, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                }
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (response) {
                swal(response.status);
                if(response.redirect != null){
                    setTimeout(function(){
                        window.location.href = response.redirect;
                    }, 2000);
                }
            });
        }

        if(review_id != null){
            fetch('/update-review?review_id='+review_id+'&user_review='+form_review, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                }
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (response) {
                swal(response.status);
                if(response.redirect != null){
                    setTimeout(function(){
                        window.location.href = response.redirect;
                    }, 2000);
                }
            });
        }
    });
}