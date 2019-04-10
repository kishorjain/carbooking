  
   <table border="1">  
      <tbody>  
         <tr>  
            <td>CarId</td>  
            <td>Car Name</td>
            <td>Car Type</td>
            <td>Price</td>
            <td>Status</td>  
         </tr>  
         <?php  
         foreach ($data as $row)  
         {  
            ?><tr>  
            <td><?php echo $row->carId;?></td>  
            <td><?php echo $row->carName;?></td>
            <td><?php echo $row->carType;?></td>
            <td><?php echo $row->price;?></td>
            <td><?php echo $row->status;?></td>  
            <td><a href="<?php echo base_url() ?>carbooking/<?php echo $row->carId ?>">carbooking</a>

            </tr>  
         <?php }  
         ?>  
      </tbody>  
   </table>  

