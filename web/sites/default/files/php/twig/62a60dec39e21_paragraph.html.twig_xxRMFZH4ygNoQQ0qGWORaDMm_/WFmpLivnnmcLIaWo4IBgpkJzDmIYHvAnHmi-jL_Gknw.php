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

/* paragraph.html.twig */
class __TwigTemplate_fb9cb173b7784fe301799e3f880146f9fa47da5a33771c4c626b5e908e4c1115 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'paragraph' => [$this, 'block_paragraph'],
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "
";
        // line 43
        $context["classes"] = twig_array_merge([0 => "paragraph", 1 => (( !twig_get_attribute($this->env, $this->source,         // line 45
($context["paragraph"] ?? null), "isPublished", [], "method", false, false, true, 45)) ? ("paragraph--unpublished") : ("")), 2 => \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 46
($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 46), 46, $this->source)), 3 => ((\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 47
($context["paragraph"] ?? null), "bundle", [], "any", false, false, true, 47), 47, $this->source)) . "--") . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 47, $this->source)))], ((        // line 48
array_key_exists("classes", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 48, $this->source), [])) : ([])));
        // line 49
        echo "
";
        // line 53
        $context["background_style"] = (($context["background_style"]) ?? (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_background_style", [], "any", false, true, true, 53), 0, [], "any", false, true, true, 53), "value", [], "any", true, true, true, 53)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_background_style", [], "any", false, true, true, 53), 0, [], "any", false, true, true, 53), "value", [], "any", false, false, true, 53), 53, $this->source), null)) : (null))));
        // line 54
        if (($context["background_style"] ?? null)) {
            // line 55
            echo "  ";
            $context["classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 55, $this->source), [0 => ("bg-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["background_style"] ?? null), 55, $this->source)))]);
            // line 56
            echo "
  ";
            // line 57
            if ((($context["background_style"] ?? null) == "dark")) {
                // line 58
                echo "    ";
                $context["classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 58, $this->source), [0 => "text-light"]);
                // line 59
                echo "  ";
            }
        }
        // line 61
        echo "
";
        // line 62
        $this->displayBlock('paragraph', $context, $blocks);
    }

    public function block_paragraph($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 63
        echo "  <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 63), 63, $this->source), "html", null, true);
        echo ">
    ";
        // line 64
        $this->displayBlock('content', $context, $blocks);
        // line 67
        echo "  </div>
";
    }

    // line 64
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 65
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 65, $this->source), "html", null, true);
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "paragraph.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 65,  94 => 64,  89 => 67,  87 => 64,  82 => 63,  75 => 62,  72 => 61,  68 => 59,  65 => 58,  63 => 57,  60 => 56,  57 => 55,  55 => 54,  53 => 53,  50 => 49,  48 => 48,  47 => 47,  46 => 46,  45 => 45,  44 => 43,  41 => 41,);
    }

    public function getSourceContext()
    {
        return new Source("", "paragraph.html.twig", "profiles/contrib/apigee_devportal_kickstart/themes/custom/apigee_kickstart/templates/paragraph/paragraph.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 43, "if" => 54, "block" => 62);
        static $filters = array("merge" => 48, "clean_class" => 46, "default" => 48, "escape" => 63);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['merge', 'clean_class', 'default', 'escape'],
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
