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

/* page.html.twig */
class __TwigTemplate_0c314cb67464c3eb4e5843c9a53766b34a644de6a071c13a48b055ff6d12bf61 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 61
        echo "
";
        // line 63
        $context["classes"] = twig_array_merge([0 => "page"], ((        // line 65
array_key_exists("classes", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 65, $this->source), [])) : ([])));
        // line 66
        echo "
";
        // line 67
        $context["main_container"] = (($context["main_container"]) ?? (true));
        // line 68
        $context["main_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 69
        $context["main_classes"] = twig_array_merge([0 => "main"], ((        // line 71
array_key_exists("main_classes", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["main_classes"] ?? null), 71, $this->source), [])) : ([])));
        // line 72
        echo "
";
        // line 73
        $context["sidebar_placement"] = ((array_key_exists("sidebar_placement", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["sidebar_placement"] ?? null), 73, $this->source), "default")) : ("default"));
        // line 74
        echo "
<div";
        // line 75
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 75), 75, $this->source), "html", null, true);
        echo ">
  ";
        // line 76
        $this->loadTemplate("page.html.twig", "page.html.twig", 76, "1980017028")->display(twig_array_merge($context, ["placement" => "sticky-top", "container" => "fixed", "color" => false]));
        // line 102
        echo "
  ";
        // line 103
        if ($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumbs", [], "any", false, false, true, 103))) {
            // line 104
            echo "    <nav aria-label=\"breadcrumb\" class=\"page__breadcrumbs\">
      <div class=\"container\">
        <ol class=\"breadcrumb\">
          ";
            // line 107
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumbs", [], "any", false, false, true, 107), 107, $this->source), "html", null, true);
            echo "
        </ol>
      </div>
    </nav>
  ";
        }
        // line 112
        echo "
  ";
        // line 113
        if ($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 113))) {
            // line 114
            echo "    <header class=\"page__header\">
      ";
            // line 116
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_header", [], "any", false, false, true, 116), "value", [], "any", false, false, true, 116)) {
                // line 117
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 117), 117, $this->source), "apigee_kickstart_title"), "html", null, true);
                echo "
      ";
            } else {
                // line 119
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 119), 119, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 121
            echo "    </header>
  ";
        }
        // line 123
        echo "
  ";
        // line 125
        echo "  ";
        if (($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "tasks", [], "any", false, false, true, 125)) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_header", [], "any", false, false, true, 125), "value", [], "any", false, false, true, 125))) {
            // line 126
            echo "    <div class=\"page__tasks\">
      <div class=\"container\">
        ";
            // line 128
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "tasks", [], "any", false, false, true, 128), 128, $this->source), "html", null, true);
            echo "
      </div>
    </div>
  ";
        }
        // line 132
        echo "
  ";
        // line 133
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_above", [], "any", false, false, true, 133)) {
            // line 134
            echo "    <div class=\"page__content-above\">
      <div class=\"container-fluid px-0\">
        ";
            // line 136
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_above", [], "any", false, false, true, 136), 136, $this->source), "html", null, true);
            echo "
      </div>
    </div>
  ";
        }
        // line 140
        echo "
  <main";
        // line 141
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["main_attributes"] ?? null), "addClass", [0 => ($context["main_classes"] ?? null)], "method", false, false, true, 141), 141, $this->source), "html", null, true);
        echo " role=\"main\">
    <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 143
        echo "    ";
        $this->displayBlock('main', $context, $blocks);
        // line 167
        echo "  </main>

  ";
        // line 169
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_below", [], "any", false, false, true, 169)) {
            // line 170
            echo "    <div class=\"page__content-below\">
      <div class=\"container-fluid px-0\">
        ";
            // line 172
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_below", [], "any", false, false, true, 172), 172, $this->source), "html", null, true);
            echo "
      </div>
    </div>
  ";
        }
        // line 176
        echo "
  ";
        // line 177
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 177) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 177))) {
            // line 178
            echo "    <footer class=\"page__footer\">
      ";
            // line 179
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 179)) {
                // line 180
                echo "        <div class=\"footer pt-5 pb-4 pb-md-8\">
          <div class=\"container\">
            <div class=\"d-md-flex justify-content-md-between\">
              ";
                // line 183
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 183), 183, $this->source), "html", null, true);
                echo "
            </div>
          </div>
        </div>
      ";
            }
            // line 188
            echo "
      ";
            // line 189
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 189)) {
                // line 190
                echo "        <div class=\"copyright py-1\">
          <div class=\"container\">
            <div class=\"d-md-flex justify-content-md-end\">
              ";
                // line 193
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 193), 193, $this->source), "html", null, true);
                echo "
            </div>
          </div>
        </div>
      ";
            }
            // line 198
            echo "    </footer>
  ";
        }
        // line 200
        echo "</div>
";
    }

    // line 143
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 144
        echo "      ";
        if ((($context["sidebar_placement"] ?? null) == "bottom")) {
            // line 145
            echo "        ";
            $this->loadTemplate("@apigee-kickstart/page/sidebar-bottom.twig", "page.html.twig", 145)->display(twig_array_merge($context, ["container" =>             // line 146
($context["main_container"] ?? null), "content" => twig_get_attribute($this->env, $this->source,             // line 147
($context["page"] ?? null), "content", [], "any", false, false, true, 147), "sidebar_first" => twig_get_attribute($this->env, $this->source,             // line 148
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 148), "sidebar_second" => twig_get_attribute($this->env, $this->source,             // line 149
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 149)]));
            // line 151
            echo "
      ";
        } elseif ((        // line 152
($context["sidebar_placement"] ?? null) == "none")) {
            // line 153
            echo "        ";
            $this->loadTemplate("@apigee-kickstart/page/sidebar-none.twig", "page.html.twig", 153)->display(twig_array_merge($context, ["container" =>             // line 154
($context["main_container"] ?? null), "content" => twig_get_attribute($this->env, $this->source,             // line 155
($context["page"] ?? null), "content", [], "any", false, false, true, 155)]));
            // line 157
            echo "
      ";
        } else {
            // line 159
            echo "        ";
            $this->loadTemplate("@apigee-kickstart/page/sidebar-default.twig", "page.html.twig", 159)->display(twig_array_merge($context, ["container" =>             // line 160
($context["main_container"] ?? null), "content" => twig_get_attribute($this->env, $this->source,             // line 161
($context["page"] ?? null), "content", [], "any", false, false, true, 161), "sidebar_first" => twig_get_attribute($this->env, $this->source,             // line 162
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 162), "sidebar_second" => twig_get_attribute($this->env, $this->source,             // line 163
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 163)]));
            // line 165
            echo "      ";
        }
        // line 166
        echo "    ";
    }

    public function getTemplateName()
    {
        return "page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 166,  260 => 165,  258 => 163,  257 => 162,  256 => 161,  255 => 160,  253 => 159,  249 => 157,  247 => 155,  246 => 154,  244 => 153,  242 => 152,  239 => 151,  237 => 149,  236 => 148,  235 => 147,  234 => 146,  232 => 145,  229 => 144,  225 => 143,  220 => 200,  216 => 198,  208 => 193,  203 => 190,  201 => 189,  198 => 188,  190 => 183,  185 => 180,  183 => 179,  180 => 178,  178 => 177,  175 => 176,  168 => 172,  164 => 170,  162 => 169,  158 => 167,  155 => 143,  151 => 141,  148 => 140,  141 => 136,  137 => 134,  135 => 133,  132 => 132,  125 => 128,  121 => 126,  118 => 125,  115 => 123,  111 => 121,  105 => 119,  99 => 117,  96 => 116,  93 => 114,  91 => 113,  88 => 112,  80 => 107,  75 => 104,  73 => 103,  70 => 102,  68 => 76,  64 => 75,  61 => 74,  59 => 73,  56 => 72,  54 => 71,  53 => 69,  51 => 68,  49 => 67,  46 => 66,  44 => 65,  43 => 63,  40 => 61,);
    }

    public function getSourceContext()
    {
        return new Source("", "page.html.twig", "profiles/contrib/apigee_devportal_kickstart/themes/custom/apigee_kickstart/templates/page/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 63, "embed" => 76, "if" => 103, "block" => 143, "include" => 145);
        static $filters = array("merge" => 65, "default" => 65, "escape" => 75, "render" => 103, "without" => 117);
        static $functions = array("create_attribute" => 68);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'embed', 'if', 'block', 'include'],
                ['merge', 'default', 'escape', 'render', 'without'],
                ['create_attribute']
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


/* page.html.twig */
class __TwigTemplate_0c314cb67464c3eb4e5843c9a53766b34a644de6a071c13a48b055ff6d12bf61___1980017028 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'branding' => [$this, 'block_branding'],
            'left' => [$this, 'block_left'],
            'right' => [$this, 'block_right'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 76
        return "@apigee-kickstart/navbar/navbar.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@apigee-kickstart/navbar/navbar.twig", "page.html.twig", 76);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 82
    public function block_branding($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 83
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_branding", [], "any", false, false, true, 83)) {
            // line 84
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_branding", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 86
        echo "    ";
    }

    // line 88
    public function block_left($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 89
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_left", [], "any", false, false, true, 89)) {
            // line 90
            echo "        <div class=\"mr-auto\">
          ";
            // line 91
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_left", [], "any", false, false, true, 91), 91, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 94
        echo "    ";
    }

    // line 96
    public function block_right($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 97
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_right", [], "any", false, false, true, 97)) {
            // line 98
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_right", [], "any", false, false, true, 98), 98, $this->source), "html", null, true);
            echo "
      ";
        }
        // line 100
        echo "    ";
    }

    public function getTemplateName()
    {
        return "page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  401 => 100,  395 => 98,  392 => 97,  388 => 96,  384 => 94,  378 => 91,  375 => 90,  372 => 89,  368 => 88,  364 => 86,  358 => 84,  355 => 83,  351 => 82,  340 => 76,  263 => 166,  260 => 165,  258 => 163,  257 => 162,  256 => 161,  255 => 160,  253 => 159,  249 => 157,  247 => 155,  246 => 154,  244 => 153,  242 => 152,  239 => 151,  237 => 149,  236 => 148,  235 => 147,  234 => 146,  232 => 145,  229 => 144,  225 => 143,  220 => 200,  216 => 198,  208 => 193,  203 => 190,  201 => 189,  198 => 188,  190 => 183,  185 => 180,  183 => 179,  180 => 178,  178 => 177,  175 => 176,  168 => 172,  164 => 170,  162 => 169,  158 => 167,  155 => 143,  151 => 141,  148 => 140,  141 => 136,  137 => 134,  135 => 133,  132 => 132,  125 => 128,  121 => 126,  118 => 125,  115 => 123,  111 => 121,  105 => 119,  99 => 117,  96 => 116,  93 => 114,  91 => 113,  88 => 112,  80 => 107,  75 => 104,  73 => 103,  70 => 102,  68 => 76,  64 => 75,  61 => 74,  59 => 73,  56 => 72,  54 => 71,  53 => 69,  51 => 68,  49 => 67,  46 => 66,  44 => 65,  43 => 63,  40 => 61,);
    }

    public function getSourceContext()
    {
        return new Source("", "page.html.twig", "profiles/contrib/apigee_devportal_kickstart/themes/custom/apigee_kickstart/templates/page/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 83);
        static $filters = array("escape" => 84);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
