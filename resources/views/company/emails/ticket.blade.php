<!DOCTYPE html>
<html lang="en-US">
   <head>
          <meta charset="utf-8">
    </head>
    <body>
    	  <h3>{{$header}} {{ ucfirst($last_comment) }},</h3>
    	  <br>
          <p>{{$sub_header}} &nbsp; &quot;<b>{{ ucfirst($subject) }}</b>&quot; </p>
          <p>
            <?php echo html_entity_decode($content); ?>
          </p>
		      <br>
          <p>
            {{ $company_name }}
          </p>
    </body>
</html>