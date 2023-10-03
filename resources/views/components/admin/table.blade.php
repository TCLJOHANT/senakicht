<link rel="stylesheet" href="{{ asset ('css/shared/codelab_ui/table1.css') }}"> 
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap"> 
                    <table class="tabla">
                      <thead class="thead-primary">
                        <tr>
                          <th>&nbsp;</th>
                          <th>&nbsp;</th>
                          @foreach ($columns as $column)
                            <th>{{ $column }}</th>
                          @endforeach
                          <th>&nbsp;</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($items as $item)
                        <tr class="alert" role="alert">
                        
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                      <input type="checkbox" checked>
                                      <span class="checkmark"></span>
                                    </label>
                            </td>
                            <td>
                                <div class="imagen"><img src="" alt="" width="60px"></div>
                            </td>
                            <td>
                                <div class="email">
                                    <span>Sneakers Shoes 2020 For Men </span>
                                    <span>Fugiat voluptates quasi nemo, ipsa perferendis...</span>
                                </div>
                            </td>
                            <td>$44.99</td>
                            <td class="quantity  text-center">

                               2
                            </td>
                            <td>$89.98</td>
                            
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                <form action="" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</section> 