<table class="table">
  <tbody>
    <tr>
      <th scope="row">Zada, Bikodže</th>
      <th>Broj kalkulacije:</th>
      <th></th>
      <th>Dobavljac:</th>
    </tr>
    <tr>
      <th scope="row">Datum: <?= $date ?></th>
      <th>Faktura:</th>
      <th></th>
      <th>Broj UCDJ:</th>
    </tr>
    <tr>
      <th scope="row"></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </tbody>
</table>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Artikal</th>
      <th scope="col">Jedinica mjere</th>
      <th scope="col">Kolicina</th>
      <th scope="col">Nabavna cijena</th>
      <th scope="col">Marža %</th>
      <th scope="col">PDV %</th>
      <th scope="col">MP cijena</th>
      <th scope="col">Ukupno bez PDV-a</th>
      <th scope="col">Ukupno sa PDV-om</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($products as $key => $product ): ?>
	    <tr>
	      <th scope="row"><?= $key + 1 ?></th>
	      <td><?= $product->name ?></td>
	      <td><?= $product->type ?></td>
	      <td><?= $product->quantity ?></td>
	      <td><?= $product->price ?></td>
	      <td><?= $product->ruc ?></td>
	      <td><?= $product->pdv ?></td>
	      <td><?= $product->mp_price ?></td>
	      <td><?= $product->sum_price_without_pdv ?></td>
	      <td><?= $product->sum_price_with_padv ?></td>
	    </tr>
    <?php endforeach ?>
    <tr>
    	<th colspan="8">Ukupno: </th>
    	<th><?= $sum_without_pdv ?></th>
    	<th><?= $sum_with_pdv ?></th>
    </tr>
  </tbody>
</table>