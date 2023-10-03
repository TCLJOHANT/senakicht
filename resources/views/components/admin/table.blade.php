<link rel="stylesheet" href="{{ asset ('css/shared/codelab_ui/table1') }}"> 
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap"> 
                    <table class="table">
                      <thead class="thead-primary">
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>total</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="alert" role="alert">
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                      <input type="checkbox" checked>
                                      <span class="checkmark"></span>
                                    </label>
                            </td>
                            <td>
                                <div class="img" style="background-image: url(images/product-1.png);"></div>
                            </td>
                          <td>
                              <div class="email">
                                  <span>Sneakers Shoes 2020 For Men </span>
                                  <span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
                              </div>
                          </td>
                          <td>$44.99</td>
                          <td class="quantity">
                            <div class="input-group">
                             <input type="text" name="quantity" class="quantity form-control input-number" value="2" min="1" max="100">
                          </div>
                      </td>
                      <td>$89.98</td>
                          <td>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                          </button>
                        </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</section> 