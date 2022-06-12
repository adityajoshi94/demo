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

/* @apigee-kickstart/navbar/navbar.twig */
class __TwigTemplate_3673d0b5d587669c7787b8245e8ca4b24ed331189aa14461ab424d66327c325e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'branding' => [$this, 'block_branding'],
            'left' => [$this, 'block_left'],
            'right' => [$this, 'block_right'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("radix/navbar"), "html", null, true);
        echo "

";
        // line 20
        $context["container"] = (((($context["container"] ?? null) == "fixed")) ? ("container") : (false));
        // line 21
        $context["placement"] = (($context["placement"]) ?? (""));
        // line 22
        $context["color"] = (($context["color"]) ?? ("light"));
        // line 23
        echo "
<nav class=\"navbar navbar-expand-lg justify-content-between navbar-";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["color"] ?? null), 24, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placement"] ?? null), 24, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 24, $this->source), " "), "html", null, true);
        echo "\">
  ";
        // line 25
        if (($context["container"] ?? null)) {
            // line 26
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 26, $this->source), "html", null, true);
            echo "\">
  ";
        }
        // line 28
        echo "
  ";
        // line 29
        $this->displayBlock('branding', $context, $blocks);
        // line 32
        echo "
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\".navbar-collapse\" aria-controls=\"navbar-collapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\">
      ";
        // line 35
        if ( !($context["color"] ?? null)) {
            // line 36
            echo "        ";
            $this->loadTemplate("@apigee-kickstart/icons/navbar-toggle.svg", "@apigee-kickstart/navbar/navbar.twig", 36)->display($context);
            // line 37
            echo "      ";
        }
        // line 38
        echo "    </span>
  </button>

  <div class=\"collapse navbar-collapse\">
    ";
        // line 42
        $this->displayBlock('left', $context, $blocks);
        // line 45
        echo "
    ";
        // line 46
        $this->displayBlock('right', $context, $blocks);
        // line 49
        echo "  </div>

  ";
        // line 51
        if (($context["container"] ?? null)) {
            // line 52
            echo "    </div>
  ";
        }
        // line 54
        echo "</nav>
";
    }

    // line 29
    public function block_branding($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["branding"] ?? null), 30, $this->source), "html", null, true);
        echo "
  ";
    }

    // line 42
    public function block_left($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["left"] ?? null), 43, $this->source), "html", null, true);
        echo "
    ";
    }

    // line 46
    public function block_right($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 47
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["right"] ?? null), 47, $this->source), "html", null, true);
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "@apigee-kickstart/navbar/navbar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 47,  140 => 46,  133 => 43,  129 => 42,  122 => 30,  118 => 29,  113 => 54,  109 => 52,  107 => 51,  103 => 49,  101 => 46,  98 => 45,  96 => 42,  90 => 38,  87 => 37,  84 => 36,  82 => 35,  77 => 32,  75 => 29,  72 => 28,  66 => 26,  64 => 25,  56 => 24,  53 => 23,  51 => 22,  49 => 21,  47 => 20,  42 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("", "@apigee-kickstart/navbar/navbar.twig", "C:\\xampp\\htdocs\\apigee_local\\web\\profiles\\contrib\\apigee_devportal_kickstart\\themes\\custom\\apigee_kickstart\\src\\components\\navbar\\navbar.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 20, "if" => 25, "block" => 29, "include" => 36);
        static $filters = array("escape" => 18, "join" => 24);
        static $functions = array("attach_library" => 18);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'include'],
                ['escape', 'join'],
                ['attach_library']
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
