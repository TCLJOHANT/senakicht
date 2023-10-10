<link rel="stylesheet" href="{{ asset ('css/shared/codelab_ui/table2.css') }}"> 
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Table #05</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl">
                      <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Email</th>
                          <th>Username</th>
                          <th>Status</th>
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
                          <td class="d-flex align-items-center">
                              <div class="img" style="background-image: url(data:image/jpeg;base64,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);"></div>
                              <div class="pl-3 email">
                                  <span>markotto@email.com</span>
                                  <span>Added: 01/03/2020</span>
                              </div>
                          </td>
                          <td>Markotto89</td>
                          <td class="status"><span class="active">Active</span></td>
                          <td>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                          </button>
                        </td>
                        </tr>
                        <tr class="alert" role="alert">
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                    </label>
                            </td>
                          <td class="d-flex align-items-center">
                              <div class="img" style="background-image: url(data:image/jpeg;base64,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);"></div>
                              <div class="pl-3 email">
                                  <span>jacobthornton@email.com</span>
                                  <span>Added: 01/03/2020</span>
                              </div>
                          </td>
                          <td>Jacobthornton</td>
                          <td class="status"><span class="waiting">Waiting for Resassignment</span></td>
                          <td>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                          </button>
                        </td>
                        </tr>
                        <tr class="alert" role="alert">
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                    </label>
                            </td>
                          <td class="d-flex align-items-center">
                              <div class="img" style="background-image: url(data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEABQODxIPDRQSEBIXFRQYHjIhHhwcHj0sLiQySUBMS0dARkVQWnNiUFVtVkVGZIhlbXd7gYKBTmCNl4x9lnN+gXwBFRcXHhoeOyEhO3xTRlN8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fP/AABEIAIIAggMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAAAQUCBAYDB//EADYQAAICAQIDBAgFAwUAAAAAAAABAgMEBRESITETQVFxBhQiMlJhgdEzQpGhwSNysRYkQ2Lh/8QAFwEBAQEBAAAAAAAAAAAAAAAAAAEDAv/EABsRAQEBAQEBAQEAAAAAAAAAAAABAhExQSFR/9oADAMBAAIRAxEAPwDqAARQAACCSAPLIyKsatzumoRXeyos9J8SE9lXbJePJFVreZPKypRXKEHtFfPxKuyUW9nxcupFdfj+kOn3yUXZKqT+OOy/Us4WQs/DnGf9r3Pnrk4R9h8SfXlzRnTZGMW3NxmuafFtsUfQgUmhatLJ/wBtky3tS3hN/nX3LsIAACAAAAAVkAAgAABQaxqsuKWPjWOO3KUo9ZPwXyLfPulj4V1sFvKEW0cRKalXOxc305vxJViw0fTvXVO23fg328ywnpGHF86nLzkzd0yhYmBVBr2mt35kX2TUvdWxnW2YoszTdrXOiHCvBMqrISUnFrh26Jo6ucp7bpGc8SrKx3Gytbtcn3pjNpvMcpj2WQmtp7Si+KLT6M7TS89ahjcbXDZHlOPz8fJnFWwlCW0tt92mdB6K+9krd7bR6/U0YuiABUQAAAACsgAEAABjKKnFxkt01s0cNDHshlSx7qpNyltt03fcd2UeRQo6tiSe3OVje312OdOszry1GFsFGV9t0uXSrlsamlWKy2Uoytikt+GyXFuXOoVXTqXZOXs/Czxw6uyjKfAl7P1kzitpPqlzs62yzspqVXPZJSGnZcoT2ryrOLfbhnzTPbWa4Omu2dfjFvpz7idHr4opQ4pp9z6F+Jy2/qu1GqUMreacZWNya7vp9S79E4bRy58/ejHn8k/ua2vxhC7F3XE03v8APoXWkVdlVdGP4faPg/t2T/k6lZ6ntWABB04AAAAAVkCAESAABr2Ux4nPgi5b78XejYIfNbEs6svGlqM3DFltLh36vwNN3WQxl6vwRUY7JORu5dSux51z71szVhX6hjP1eW0OvA47rfx+RnfW2fFBkXX2RurlcpRmuceNPb6G5o929HsR4JR5PwfzMMqyGZVKN0YpQ5pQjtu/n+gw5SVMElwr/Ivi/VjZXDKbqnCU3KH5YttLfn5dxaYVHq+LCvpsjy06qUK5WS/5Ntl4JG4d5nGetd/Agkg6ZgACgIAGQACAAAkEEga+RW5p8PVfuVWVcownFt7v8r7i6fvM8MnFqviu0gpPx7zixpm8ctLJqrk6+FcPeben19pOLmmorpE9pafjRvk66+fdu9zaxMfsmcd/jTn2rWr8KPkZHjXfCKUZyjF77Ld7bnsbRhfQgAIEABQAAZAgBEg8crKow6nbkWKuC733+Xic/lelqUmsTG4l8Vr2/ZfcDpjUy9TxMPlbanP4I85HG5et5+Wtp3OEfhr9lGjGbTfiwPomJc8nGrvaSVi4kl3J9CclzjRPs1vLblzOIwdYy8DlVPir+CXNFl/q21x2lhQb+Vr+xLFlW2NjTinOyXNnpZbXjxdl1ka4Lvk9jmsj0kzbeVcaqV/1W7/crL8i3Inx32Ssl4ye+3l4HMy7u1prWsrMToxk1Tv7UmucvsjDB9IM3EhwOSvguis5tfUqQdycZ29drpmv0ZslXclRc+ib3jLyZbnzRNroWOJrmdibKNvHBflnzX/hTrugVmma3j6glB/0r/gb6+TLIgkgAKyNTUc6Gn4rtmuKT5Qj8TNo5D0kyu11F1p+xTHh+vV/x+hUVGVk3Zd0rb5ynJvvfT5LwPEy2ICAAAgAAAAAAAAAANzsfR3VHmUer3Pe+pcn8cfHzOOLHQb+w1fHk2kpvgf15f52Cu6ABFY3Wxppstn7sIuT+h8+vslbbKc3u5Nt+Z2HpDf2OlTinztah9/2Rxb6yKiN+RHyC5gIgAgAAAAAAAAAAABlXN12Rsj1g1JeaMQB9Krkra4WRa2klJfUHG0a7dTRXUlyhFR/REhVn6WP+niru4pfwct+ZgArFe6zJ+6wAjAAAAAAAAAAAAAAAAEgAD//2Q==);"></div>
                              <div class="pl-3 email">
                                  <span>larrybird@email.com</span>
                                  <span>Added: 01/03/2020</span>
                              </div>
                          </td>
                          <td>Larry_bird</td>
                          <td class="status"><span class="active">Active</span></td>
                          <td>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                          </button>
                        </td>
                        </tr>
                        <tr class="alert" role="alert">
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                    </label>
                            </td>
                          <td class="d-flex align-items-center">
                              <div class="img" style="background-image: url(data:image/jpeg;base64,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));"></div>
                              <div class="pl-3 email">
                                  <span>johndoe@email.com</span>
                                  <span>Added: 01/03/2020</span>
                              </div>
                          </td>
                          <td>Johndoe1990</td>
                          <td class="status"><span class="active">Active</span></td>
                          <td>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                          </button>
                        </td>
                        </tr>
                        <tr class="alert" role="alert">
                            <td class="border-bottom-0">
                                <label class="checkbox-wrap checkbox-primary">
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                    </label>
                            </td>
                          <td class="d-flex align-items-center border-bottom-0">
                              <div class="img" style="background-image: url(data:image/jpeg;base64,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);"></div>
                              <div class="pl-3 email">
                                  <span>garybird@email.com</span>
                                  <span>Added: 01/03/2020</span>
                              </div>
                          </td>
                          <td class="border-bottom-0">Garybird_2020</td>
                          <td class="status border-bottom-0"><span class="waiting">Waiting for Resassignment</span></td>
                          <td class="border-bottom-0">
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