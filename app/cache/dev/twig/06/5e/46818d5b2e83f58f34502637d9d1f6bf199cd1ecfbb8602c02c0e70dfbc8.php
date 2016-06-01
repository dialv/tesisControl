<?php

/* tesisControltesisBundle::menu.html.twig */
class __TwigTemplate_065e46818d5b2e83f58f34502637d9d1f6bf199cd1ecfbb8602c02c0e70dfbc8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "  ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 5
        echo "  ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 8
        echo "<span class=\"preload1\"></span>
<span class=\"preload2\"></span>
 
<ul id=\"nav\">
    <li class=\"top\">
        <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("usuario");
        echo "\" class=\"top_link\">
            <span class=\"down\">Evaluación</span></a>
            <ul class=\"sub\">
                <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("usuario_new");
        echo "\">Agregar</a></li>
            </ul>
    </li>
    <li class=\"top\">
        <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("usuario");
        echo "\" class=\"top_link\">
            <span class=\"down\">Asignatura</span> </a>
            <ul class=\"sub\">
                <li><a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("usuario_new");
        echo "\">Agregar</a></li>
            </ul>
    </li>
    <li class=\"top\">
        <a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("usuario");
        echo "\" class=\"top_link\">
            <span class=\"down\">Estudiante</span> </a>
          <ul class=\"sub\">
                <li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("usuario_new");
        echo "\">Agregar</a></li>
            </ul>
    </li>
</ul>";
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/menu/pro_drop_1.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
  ";
    }

    // line 5
    public function block_javascripts($context, array $blocks = array())
    {
        echo "       
        <script type=\"text/javascript\" src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/tesiscontroltesis/menu/stuHover.js"), "html", null, true);
        echo "\" ></script>
  ";
    }

    public function getTemplateName()
    {
        return "tesisControltesisBundle::menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 6,  84 => 5,  77 => 3,  74 => 2,  66 => 30,  60 => 27,  53 => 23,  47 => 20,  40 => 16,  34 => 13,  27 => 8,  24 => 5,  21 => 2,);
    }
}
