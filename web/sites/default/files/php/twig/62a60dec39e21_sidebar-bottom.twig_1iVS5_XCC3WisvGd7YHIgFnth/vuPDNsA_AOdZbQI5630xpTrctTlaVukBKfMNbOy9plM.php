<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @apigee-kickstart/page/sidebar-bottom.twig */
class __TwigTemplate_ecdaec31164b783e8f35d8441f70d1892656b1a468fa57b1d870f9a12d7ebf67 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 23
        echo "
";
        // line 24
        $context["sidebar_classes"] = twig_array_merge([0 => (((        // line 25
($context["sidebar_first"] ?? null) && ($context["sidebar_second"] ?? null))) ? ("col-md-auto") : ("")), 1 => (((        // line 26
($context["sidebar_first"] ?? null) &&  !($context["sidebar_second"] ?? null))) ? ("col-md d-md-flex justify-content-around") : ("")), 2 => ((( !        // line 27
($context["sidebar_first"] ?? null) && ($context["sidebar_second"] ?? null))) ? ("col-md d-md-flex justify-content-around") : (""))], ((        // line 28
array_key_exists("sidebar_classes", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["sidebar_classes"] ?? null), 28, $this->source), [])) : ([])));
        // line 29
        echo "
";
        // line 30
        ob_start(function () { return ''; });
        // line 31
        echo "  ";
        if (($context["content"] ?? null)) {
            // line 32
            echo "    <div class=\"page-layout-sidebar-bottom__top\">
      ";
            // line 33
            if (($context["container"] ?? null)) {
                // line 34
                echo "        <div class=\"container py-5\">
          <div class=\"row\">
            <div class=\"page__content col\">
              ";
                // line 37
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 37, $this->source), "html", null, true);
                echo "
            </div>
          </div>
        </div>

      ";
            } else {
                // line 43
                echo "        <div class=\"page__content\">
          ";
                // line 44
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 44, $this->source), "html", null, true);
                echo "
        </div>
      ";
            }
            // line 47
            echo "    </div>
  ";
        }
        // line 49
        echo "
  ";
        // line 50
        if ((($context["sidebar_first"] ?? null) || ($context["sidebar_second"] ?? null))) {
            // line 51
            echo "    <div class=\"page-layout-sidebar-bottom__bottom border-top\">
      <div class=\"container py-5\">
        <div class=\"row justify-content-around pt-7\">
          ";
            // line 54
            if (($context["sidebar_first"] ?? null)) {
                // line 55
                echo "            <aside class=\"sidebar sidebar-first ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_join_filter($this->sandbox->ensureToStringAllowed(($context["sidebar_classes"] ?? null), 55, $this->source), " ")), "html", null, true);
                echo "\">
              ";
                // line 56
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first"] ?? null), 56, $this->source), "html", null, true);
                echo "
            </aside>
          ";
            }
            // line 59
            echo "
          ";
            // line 60
            if (($context["sidebar_second"] ?? null)) {
                // line 61
                echo "            <aside class=\"sidebar sidebar-second ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_join_filter($this->sandbox->ensureToStringAllowed(($context["sidebar_classes"] ?? null), 61, $this->source), " ")), "html", null, true);
                echo "\">
              ";
                // line 62
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second"] ?? null), 62, $this->source), "html", null, true);
                echo "
            </aside>
          ";
            }
            // line 65
            echo "        </div>
      </div>
    </div>
  ";
        }
        $context["sidebar_bottom_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 70
        echo "
<div class=\"page-layout-sidebar-bottom\">
  ";
        // line 72
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_bottom_content"] ?? null), 72, $this->source), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@apigee-kickstart/page/sidebar-bottom.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 72,  134 => 70,  127 => 65,  121 => 62,  116 => 61,  114 => 60,  111 => 59,  105 => 56,  100 => 55,  98 => 54,  93 => 51,  91 => 50,  88 => 49,  84 => 47,  78 => 44,  75 => 43,  66 => 37,  61 => 34,  59 => 33,  56 => 32,  53 => 31,  51 => 30,  48 => 29,  46 => 28,  45 => 27,  44 => 26,  43 => 25,  42 => 24,  39 => 23,);
    }

    public function getSourceContext()
    {
        return new Source("", "@apigee-kickstart/page/sidebar-bottom.twig", "C:\\xampp\\htdocs\\apigee_local\\web\\profiles\\contrib\\apigee_devportal_kickstart\\themes\\custom\\apigee_kickstart\\src\\components\\page\\sidebar-bottom.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 24, "if" => 31);
        static $filters = array("merge" => 28, "default" => 28, "escape" => 37, "trim" => 55, "join" => 55);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['merge', 'default', 'escape', 'trim', 'join'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
