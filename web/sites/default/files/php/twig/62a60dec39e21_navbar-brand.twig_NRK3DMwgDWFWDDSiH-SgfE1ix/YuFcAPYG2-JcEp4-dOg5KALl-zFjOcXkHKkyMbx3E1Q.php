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

/* @radix/navbar/navbar-brand.twig */
class __TwigTemplate_f0e71af90e6e0307839e19d48fcb1bc19b68ab3d4f16d70666bb12b1ac40b1e6 extends \Twig\Template
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
        // line 17
        $macros["navbar_brand"] = $this->macros["navbar_brand"] = $this;
        // line 18
        $context["utility_classes"] = twig_join_filter($this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 18, $this->source), " ");
        // line 19
        echo "
";
        // line 20
        if (($context["path"] ?? null)) {
            // line 21
            echo "  <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["path"] ?? null), 21, $this->source), "html", null, true);
            echo "\" class=\"navbar-brand d-flex align-items-center ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 21, $this->source), "html", null, true);
            echo "\" aria-label=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 21, $this->source), "html", null, true);
            echo "\">
    ";
            // line 22
            if (($context["image"] ?? null)) {
                // line 23
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["navbar_brand"], "macro_image", [($context["image"] ?? null), ($context["width"] ?? null), ($context["height"] ?? null), ($context["alt"] ?? null)], 23, $context, $this->getSourceContext()));
                echo "
    ";
            }
            // line 25
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 25, $this->source), "html", null, true);
            echo "
  </a>
";
        } else {
            // line 28
            echo "  <span class=\"navbar-brand h1 mb-0 ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 28, $this->source), "html", null, true);
            echo "\" aria-label=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 28, $this->source), "html", null, true);
            echo "\">
    ";
            // line 29
            if (($context["image"] ?? null)) {
                // line 30
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["navbar_brand"], "macro_image", [($context["image"] ?? null), ($context["alt"] ?? null)], 30, $context, $this->getSourceContext()));
                echo "
    ";
            }
            // line 32
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 32, $this->source), "html", null, true);
            echo "
  </span>
";
        }
        // line 35
        echo "
";
    }

    // line 36
    public function macro_image($__src__ = null, $__width__ = null, $__height__ = null, $__alt__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "src" => $__src__,
            "width" => $__width__,
            "height" => $__height__,
            "alt" => $__alt__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 37
            echo "  <img src=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 37, $this->source), "html", null, true);
            echo "\" width=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("width", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["width"] ?? null), 37, $this->source), 30)) : (30)), "html", null, true);
            echo "\" height=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("height", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["height"] ?? null), 37, $this->source), "auto")) : ("auto")), "html", null, true);
            echo "\" alt=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("alt", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["alt"] ?? null), 37, $this->source), "")) : ("")), "html", null, true);
            echo "\" class=\"mr-2\" />
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@radix/navbar/navbar-brand.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 37,  99 => 36,  94 => 35,  87 => 32,  81 => 30,  79 => 29,  72 => 28,  65 => 25,  59 => 23,  57 => 22,  48 => 21,  46 => 20,  43 => 19,  41 => 18,  39 => 17,);
    }

    public function getSourceContext()
    {
        return new Source("", "@radix/navbar/navbar-brand.twig", "C:\\xampp\\htdocs\\apigee_local\\web\\themes\\contrib\\radix\\src\\components\\navbar\\navbar-brand.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 17, "set" => 18, "if" => 20, "macro" => 36);
        static $filters = array("join" => 18, "escape" => 21, "default" => 37);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['import', 'set', 'if', 'macro'],
                ['join', 'escape', 'default'],
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
