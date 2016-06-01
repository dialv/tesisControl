<?php

/* tesisControltesisBundle::Template.html.twig */
class __TwigTemplate_e9dfa5cbbd96791aa7b814af00d56da20584fd92ca9424d2a8b786783e4f4253 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\" />
        ";
        // line 5
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo " 
        ";
        // line 11
        $this->displayBlock('javascripts', $context, $blocks);
        // line 18
        echo " 
    </head>
    <body>   
        <div id=\"divpagina\">
            <div id=\"divcuerpo\">
                <div id=\"divbanner\" align=\"center\">
                <img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/imagenes/encabezado.png"), "html", null, true);
        echo "\" alt=\"\" />
                </div>
                 ";
        // line 26
        $this->env->loadTemplate("tesisControltesisBundle::menu.html.twig")->display($context);
        // line 27
        echo "    
                    <br/><br/>
            ";
        // line 29
        $this->displayBlock('body', $context, $blocks);
        // line 31
        echo "                <div id=\"divpie\">Copyright BY epIC loool</div>
            </div>
        </div>
    </body>
</html>";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/jquery-ui-1.11.4.custom/jquery-ui.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/DataTables-1.10.12/media/css/dataTables.jqueryui.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        echo "            
        <script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jqueryjquery/js/jquery-1.12.4.min.js"), "html", null, true);
        echo "\" ></script>
        <script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/DataTables-1.10.12/media/js/jquery.dataTables.min.js"), "html", null, true);
        echo "\" ></script>
        <script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/DataTables-1.10.12/media/js/dataTables.jqueryui.min.js"), "html", null, true);
        echo "\" ></script>
       
        <script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/js/bootstrap.min.js"), "html", null, true);
        echo "\" ></script>
        ";
    }

    // line 29
    public function block_body($context, array $blocks = array())
    {
        echo "  
            ";
    }

    public function getTemplateName()
    {
        return "tesisControltesisBundle::Template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 29,  100 => 16,  95 => 14,  91 => 13,  87 => 12,  82 => 11,  76 => 8,  72 => 7,  67 => 6,  64 => 5,  56 => 31,  54 => 29,  50 => 27,  48 => 26,  43 => 24,  35 => 18,  33 => 11,  30 => 10,  28 => 5,  22 => 1,);
    }
}
