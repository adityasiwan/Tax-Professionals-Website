<?php

class FMViewGenerete_xml {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $model;

  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct($model) {
    $this->model = $model;
  }
  
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function display() {
    $params = $this->model->get_data();
	$data = $params[0];
	$title = $params[1]; 
    $filename = $title . "_" . date('Ymd') . ".xml";
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type:text/xml,  charset=utf-8");
    $flag = FALSE;	
    echo '<?xml version="1.0" encoding="utf-8" ?>'; 
	?>
    <form title="<?php echo $title; ?>">
	<?php
    foreach ($data as $key1 => $value1) {
	  ?>
      <submission>
	  <?php
      foreach ($value1 as $key => $value) {
        ?>
		<field title="<?php echo $key; ?>">
        <![CDATA[<?php echo $value; ?>]]>
        </field>
		<?php
      }
      ?>
	  </submission>
	  <?php
    }
	?>
    </form>
	<?php
    die('');
  }

  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}