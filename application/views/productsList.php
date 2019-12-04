
	
		<table>
			<tr>
				<th>Nom</th>
				<th>Fabriquant</th>
				<th>Référence</th>
				<th>Prix</th>
			</tr>
			<?php foreach($products as $product){ ?>
			<tr>
				<td><?= $product->maker ?></td>
				<td><?= $product->label ?></td>
				<td><?= $product->reference ?></td>
				<td><?= number_format($product->ptprice*1.2, 2, ",", ".") ?> €</td>
			</tr>
			<?php } ?>
		</table>
