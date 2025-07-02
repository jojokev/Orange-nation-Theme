<?php
 class Createpost {
    public function __construct(){
        add_shortcode( 'tour', array( $this, 'getposts' ) );
        add_shortcode( 'page', array( $this, 'getpage' ) );
        add_shortcode( 'tour2', array( $this, 'getpoststheme' ) );
        add_shortcode( 'tour3', array( $this, 'getpoststheme3' ) );
        add_shortcode( 'newcalendar', array( $this, 'newcalendar' ) );
        add_shortcode( 'page2', array( $this, 'getpoststheme2' ) );
        add_shortcode( 'des', array( $this, 'getdestinos' ) );
        add_shortcode( 'cols', array( $this, 'contentColumns' ) );
        add_shortcode( 'col', array( $this, 'columnsText' ) );
    }
    public function contentColumns($atts, $content = null){
        extract(shortcode_atts(array(  
            'class' => '',
        ), $atts));
        $class = $class ? ' '.$class : '';
        $content = do_shortcode($content);
        return '<div class="content_columns_page'.$class.'">'.$content.'</div>';
    }
    public function columnsText($atts, $content = null){
        extract(shortcode_atts(array(  
            'w' => '',
            'class' => '',
        ), $atts)); 
        $class = $class ? ' '.$class : '';
        $w = $w ? ' style="width:'.$w.'%;"' : '';
        return '<div class="column_text_page '.$class.'"'.$w.'>'.$content.'</div>';
    }

    public function getposts($atts) {
       extract(shortcode_atts(array(  
            'title' => '',
            'key' => '', 
            'cat'=>'',
        ), $atts)); 
       ob_start();
          get_template_part('template-parts/get_tours','get_post',array('title'=>$title,'key'=>$key,'cat'=>$cat));
        ob_get_contents();
      return  ob_get_clean();
    }
    public function getpage($atts) {
      extract(shortcode_atts(array(  
           'title' => '',
           'key' => '', 
           'cat'=>'',
       ), $atts)); 
      ob_start();
         get_template_part('template-parts/get_page','get_post',array('title'=>$title,'key'=>$key,'cat'=>$cat));
       ob_get_contents();
     return  ob_get_clean();
   }
    public function getpoststheme($atts) {
        extract(shortcode_atts(array(  
             'title' => '',
             'key' => '', 
         ), $atts)); 
        ob_start();
        get_template_part('template/post2','get_post',array('title'=>$title,'key'=>$key));
         ob_get_contents();
       return  ob_get_clean();
     }
     public function getpoststheme2($atts) {
      extract(shortcode_atts(array(  
           'title' => '',
           'key' => '', 
       ), $atts)); 
      ob_start();
      get_template_part('template/get_pagetour','get_post',array('title'=>$title,'key'=>$key));
       ob_get_contents();
     return  ob_get_clean();
   }
   public function getdestinos($atts) {
    extract(shortcode_atts(array(  
         'title' => '',
         'key' => '', 
     ), $atts)); 
    ob_start();
    get_template_part('template/get_destinos','get_post',array('title'=>$title,'key'=>$key));
     ob_get_contents();
   return  ob_get_clean();
 }
   public function getpoststheme3($atts) {
      extract(shortcode_atts(array(  
          'title' => '',
          'key' => '', 
      ), $atts)); 
      ob_start();
      get_template_part('template/get_pack','get_post',array('title'=>$title,'key'=>$key));
      ob_get_contents();
    return  ob_get_clean();
  }
    //  calendar  

    public function newcalendar(){
      extract(shortcode_atts(array(  
        'title' => '',
        'key' => '', 
          ), $atts)); 
        ob_start();
        get_template_part('template-parts/get_calendar','get_post',array('title'=>$title,'key'=>$key));
          ob_get_contents();
        return  ob_get_clean();
    }
}
new Createpost();
?>