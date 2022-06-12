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

/* @apigee-kickstart/alert/alert.twig */
class __TwigTemplate_3bc031e6dd9d77d7f837eb7ef00b912ea4abc2f6a4e69bbffe717091ac58a634 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        $context["dismissible"] = (($context["dismissible"]) ?? (true));
        // line 14
        $context["classes"] = twig_array_merge([0 => "alert", 1 => ((        // line 16
($context["type"] ?? null)) ? (("alert-" . $this->sandbox->ensureToStringAllowed(($context["type"] ?? null), 16, $this->source))) : ("")), 2 => "border-0", 3 => "rounded-sm", 4 => ((        // line 19
($context["dismissible"] ?? null)) ? ("alert-dismissible") : (""))], ((        // line 20
($context["utility_classes"] ?? null)) ? (($context["utility_classes"] ?? null)) : ([])));
        // line 21
        echo "
<div class=\"";
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 22, $this->source), " "), "html", null, true);
        echo "\" role=\"alert\">
  ";
        // line 23
        if (($context["heading"] ?? null)) {
            // line 24
            echo "    <h4 class=\"alert-heading\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["heading"] ?? null), 24, $this->source), "html", null, true);
            echo "</h4>
  ";
        }
        // line 26
        echo "
  ";
        // line 27
        $this->displayBlock('content', $context, $blocks);
        // line 30
        echo "
  ";
        // line 31
        if (($context["dismissible"] ?? null)) {
            // line 32
            echo "    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <svg width=\"14\" height=\"14\" xmlns=\"http://www.w3.org/2000/svg\">
        <path d=\"M14 1.41L12.59 0 7 5.59 1.41 0 0 1.41 5.59 7 0 12.59 1.41 14 7 8.41 12.59 14 14 12.59 8.41 7z\" fill=\"currentColor\" fill-rule=\"nonzero\" />
      </svg>
    </button>
  ";
        }
        // line 38
        echo "</div>
";
    }

    // line 27
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 28, $this->source), "html", null, true);
        echo "
  ";
    }

    public function getTemplateName()
    {
        return "@apigee-kickstart/alert/alert.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 28,  85 => 27,  80 => 38,  72 => 32,  70 => 31,  67 => 30,  65 => 27,  62 => 26,  56 => 24,  54 => 23,  50 => 22,  47 => 21,  45 => 20,  44 => 19,  43 => 16,  42 => 14,  40 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "@apigee-kickstart/alert/alert.twig", "C:\\xampp\\htdocs\\apigee_local\\web\\profiles\\contrib\\apigee_devportal_kickstart\\themes\\custom\\apigee_kickstart\\src\\components\\alert\\alert.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 13, "if" => 23, "block" => 27);
        static $filters = array("merge" => 20, "escape" => 22, "join" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['merge', 'escape', 'join'],
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
