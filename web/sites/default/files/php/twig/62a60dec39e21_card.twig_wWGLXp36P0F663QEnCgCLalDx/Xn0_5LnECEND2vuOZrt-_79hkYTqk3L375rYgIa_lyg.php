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

/* @apigee-kickstart/card/card.twig */
class __TwigTemplate_d9bed245bbc51debff9d48df39f4ebf8851dd48e2980634126c1404604bdefc0 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "
";
        // line 35
        $context["hover_shadow"] = ((array_key_exists("hover_shadow", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["hover_shadow"] ?? null), 35, $this->source), false)) : (false));
        // line 36
        $context["classes"] = twig_array_merge([0 => "card", 1 => ((        // line 38
($context["hover_shadow"] ?? null)) ? ("has-hover-shadow") : (""))], ((        // line 39
array_key_exists("classes", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 39, $this->source), [])) : ([])));
        // line 40
        echo "
";
        // line 41
        if ((($context["print_attributes"] ?? null) && ($context["attributes"] ?? null))) {
            // line 42
            echo "  ";
            // line 43
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 43), 43, $this->source), "html", null, true);
            echo ">
";
        } else {
            // line 45
            echo "  <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_trim_filter(twig_join_filter($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 45, $this->source), " ")), "html", null, true);
            echo "\">
";
        }
        // line 47
        echo "
  ";
        // line 48
        if (($context["url"] ?? null)) {
            // line 49
            echo "    <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 49, $this->source), "html", null, true);
            echo "\">
  ";
        }
        // line 51
        echo "
    ";
        // line 52
        if (($context["image"] ?? null)) {
            // line 53
            echo "      <div class=\"card-img-top\">
        ";
            // line 54
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image"] ?? null), 54, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 57
        echo "
    ";
        // line 58
        if ((($context["title"] ?? null) || ($context["body"] ?? null))) {
            // line 59
            echo "      <div class=\"card-body\">
        ";
            // line 60
            $this->displayBlock('body', $context, $blocks);
            // line 64
            echo "      </div>
    ";
        }
        // line 66
        echo "      <span class=\"text-right badge\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["api_style"] ?? null), 66, $this->source), "html", null, true);
        echo "</span>
    ";
        // line 67
        if (($context["footer"] ?? null)) {
            // line 68
            echo "      <div class=\"card-footer\">
        ";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null), 69, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 72
        echo "
  ";
        // line 73
        if (($context["url"] ?? null)) {
            // line 74
            echo "    </a>
  ";
        }
        // line 76
        echo "</div>
";
    }

    // line 60
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 61
        echo "          ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 61, $this->source), "html", null, true);
        echo "
          ";
        // line 62
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["body"] ?? null), 62, $this->source), "html", null, true);
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "@apigee-kickstart/card/card.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 62,  141 => 61,  137 => 60,  132 => 76,  128 => 74,  126 => 73,  123 => 72,  117 => 69,  114 => 68,  112 => 67,  107 => 66,  103 => 64,  101 => 60,  98 => 59,  96 => 58,  93 => 57,  87 => 54,  84 => 53,  82 => 52,  79 => 51,  73 => 49,  71 => 48,  68 => 47,  62 => 45,  56 => 43,  54 => 42,  52 => 41,  49 => 40,  47 => 39,  46 => 38,  45 => 36,  43 => 35,  40 => 34,);
    }

    public function getSourceContext()
    {
        return new Source("", "@apigee-kickstart/card/card.twig", "C:\\xampp\\htdocs\\apigee_local\\web\\profiles\\contrib\\apigee_devportal_kickstart\\themes\\custom\\apigee_kickstart\\src\\components\\card\\card.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 35, "if" => 41, "block" => 60);
        static $filters = array("default" => 35, "merge" => 39, "escape" => 43, "trim" => 45, "join" => 45);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['default', 'merge', 'escape', 'trim', 'join'],
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
