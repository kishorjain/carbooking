
<div id="container">
	<h1><center>Car Details</center></h1>
	
		<?php echo form_open('maincontroller/book'); ?>


		<table border="1">
			<tr><td><img style="width:100%"; src="<?php echo base_url('/assets/images/carwelcomeimage.jpg');?>" />
			</td><td>CarName:<?php echo $data->carName; ?></td><tr><td>CarType:<?php echo $data->carType; ?></td><td>CarPrice/day:<?php echo $data->price; ?></td></tr>
				<tr><td><label>Pickuptime</label><input type="datetime-local" name="scheduletime"></td>
				<tr><td><label>Droptime</label><input type="datetime-local" name="droptime"></td>	
				<input type="hidden" name="carId" value="<?php echo $data->carId; ?>">
				<input type="hidden" name="userId" value="1">
				<td><input type='submit' value='bookthis' name='submit'></td>
			</tr>

			</tr>


		</table>
	<?php echo form_close(); ?>

	</div>