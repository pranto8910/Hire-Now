
<?php

include('header/header.php');




?>





<center><h1>Modarator Chat</h1>

<center>
	
<form  method="post" action="" enctype="multipart/form-data">
    <div class="message_box">
        <div class="message_logs">

					<table id="table">
						<thead>
								<th>Date & Time</th>
								<th>Sender Id</th>
								<th>Reciever Id</th>
								<th>Massage</th>


						</thead>


						<tbody>
							<tr>
			<td>6/29/2021</td>
			<td>Maria123</td>
			<td>Employee321</td>
				<td>Make fast i am going outside.</td>
				
		</tr>

						</tbody>
					</table>
            </div>

        <div class="chat-form">
            <textarea name="massage" id="message"></textarea>
            <button name="send">send</button>
        </div>
				<div class="eror" id="error_message"></div>
</div>
	</form>








<?php

include('footer/footer.php');



?>