<!DOCTYPE html>
<html lang="en-US">
   <head>
          <meta charset="utf-8">
    </head>
    <body>

    	  <h3>{{$header}},</h3>
    	  <br>
          <p>{{$sub_header}}&nbsp; <b>{{ ucfirst($last_comment) }}</b> </p>
          <h3>&quot;<b>{{ ucfirst($subject) }}</b>&quot;</h3>
          <p>
            <?php echo html_entity_decode($content); ?>
          </p>
		      <br>
          <p>
            Company : {{ $company_name }}
          </p>
    </body>
</html>