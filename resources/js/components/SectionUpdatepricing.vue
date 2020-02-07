<template>
    <section class="py-8 py-md-8 " id="sectionprice">
        <div class="container-lg">
          <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12 text-left">
  
              <!-- Heading -->
              <h2 class="head-title text-bold mb-0">
                Test Update Pricing 
              </h2>
  
              <!-- Text -->
              <p class="small ">
                Silahkan update price pada form dibawah, data di homepage akan otomatis ter-update tanpa harus di refresh
              </p>

                <div class="alert alert-success" id="alertsuccess" style="display:none">
                    Success Update Price !
                </div>
            </div>
          </div> <!-- / .row -->
           <form id="formprice" enctype="multipart/form-data">
          <div class="row mt-3v">
             
              <div class="col-6 col-lg-3">
                   <h3>Bayi</h3>
                   <label >Price Before Discount</label>
                   <input class="form-control mb-3 text-right" type="number" name="price[0][price_before_discount]" id="bayi_price_before_discount" >
                   <label >Price After Discount</label>
                   <input class="form-control mb-3 text-right" type="number" name="price[0][price_after_discount]" id="bayi_price_after_discount" >
                   <input type="hidden" name="price[0][price_category]" value="bayi">
              </div>
               <div class="col-6 col-lg-3">
                   <h3>Pelajar</h3>
                   <label >Price Before Discount</label>
                   <input class="form-control mb-3 text-right" type="number" name="price[1][price_before_discount]" id="pelajar_price_before_discount" >
                   <label >Price After Discount</label>
                   <input class="form-control mb-3 text-right" type="number" name="price[1][price_after_discount]" id="pelajar_price_after_discount" >
                   <input type="hidden" name="price[1][price_category]" value="pelajar">
              </div>
              <div class="col-6 col-lg-3">
                   <h3>Personal</h3>
                   <label >Price Before Discount</label>
                   <input class="form-control mb-3 text-right" type="number" name="price[2][price_before_discount]" id="personal_price_before_discount" >
                   <label >Price After Discount</label>
                   <input class="form-control mb-3 text-right" type="number" name="price[2][price_after_discount]" id="personal_price_after_discount" >
                   <input type="hidden" name="price[2][price_category]" value="personal">
              </div>
              <div class="col-6 col-lg-3">
                   <h3>Bisnis</h3>
                   <label >Price Before Discount</label>
                   <input class="form-control mb-3 text-right" type="number" name="price[3][price_before_discount]" id="bisnis_price_before_discount" >
                   <label >Price After Discount</label>
                   <input class="form-control mb-3 text-right" type="number" name="price[3][price_after_discount]" id="bisnis_price_after_discount" >
                   <input type="hidden" name="price[3][price_category]" value="bisnis">
              </div>
              <div class="col-12 text-right mt-8">
                  <div class="spinner-border text-primary mt-5 mr-3" id="loader" role="status" style="display:none">
                  <span class="sr-only">Loading...</span>
                </div>
                  <button class="btn btn-md btn-primary lift" type="button" id="submitbutton" @click="updatePrice">Update Price</button>
              </div>
              
          </div>
          </form>
        </div> <!-- / .container -->
    </section>
</template>

<script>
    function formatNumber(angka) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            var separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return rupiah;
    }
    export default {
        props: [],
        components: {
        },
        data() {
            return {
                text: '',
                inputDisabled: false,
                messages: []
            }
        },
        mounted() {
            this.getPrice();
            Echo.channel('laravel_database_Price.Channel')
                .notification((notification) => {
                    this.getPrice()
                });
        },
        methods: {
            getPrice() {
                axios.get('/api/price').then(res => {
                    res.data.data.forEach(element => {
                        var price_before_discount = element.price_before_discount;
                        var price_after_discount = element.price_after_discount;
                        
                        $('#'+element.price_category+'_price_before_discount').val(price_before_discount);
                        $('#'+element.price_category+'_price_after_discount').val(price_after_discount);

                    });

                })
            },
            updatePrice() {
                $('#submitbutton').on('click',function(){
                    $(this).addClass('disabled')
                    $('#loader').css('display','inline-block')
                    $('#alertsuccess').slideUp()
                })
                var formData = new FormData($('#formprice')[0]);
                axios({
                    url: '/api/price/update',
                    data:formData,
                    method:'POST',
                    contentType: false,
                    processData: false,
                }).then(res => {
                    $('#submitbutton').removeClass('disabled')
                    $('#loader').css('display','none')
                    $('#alertsuccess').slideDown()
                }).finally(()=> {
                })
                
            },
        }
    }
</script>
