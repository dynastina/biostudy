<?php

namespace App\Classes\Theme;

use Illuminate\Http\Request;
use App\Classes\Theme\Metronic;
use Illuminate\Support\Facades\Route;

class Menu
{
    /**
     * Aside menu
     * @param $item
     * @param null $parent
     * @param int $rec
     * @param bool $singleItem
     *
     * @return string
     */
    public static function renderVerMenu($item, $parent = null, $rec = 0, $singleItem = false)
    {
        self::checkRecursion($rec);
        if (!$item) {
            return 'menu misconfiguration';
        }

        if (isset($item['separator'])) {
            echo '<li class="menu-separator"><span></span></li>';
        } elseif (isset($item['section'])) {
            $menuCount = 0;
            foreach ($item['menus'] as $each) {
                if (!is_int($each)) {
                    if (!\auth()->user()->can($each)) {
                        continue;
                    }
                }
                $menuCount++;
            }

            if ($menuCount != 0) {
                echo '
                    <div class="menu-item pt-1">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">' . $item['section'] . '</span>
                        </div>
                    </div>';

                //     echo '<li class="menu-section ' . ($rec === 0 ? 'menu-section--first' : '') . '">
                //     <h4 class="menu-text">' . $item['section'] . '</h4>
                //     <i class="menu-icon flaticon-more-v2"></i>
                // </li>';
            }
            
        } elseif (isset($item['title'])) {
            $item_class = '';
            $item_attr = '';
            
            if (isset($item['redirect']) && $item['redirect'] === true) {
                $item_attr .= ' data-menu-redirect="1"';
            }

            // custom class for menu item
            if (isset($item['custom-class'])) {
                $item_class .= ' ' . $item['custom-class'];
            }

            // echo '<li class="menu-item ' . $item_class . '" aria-haspopup="true" ' . $item_attr . '>';
            if (isset($item['parent'])) {
                echo '<span class="menu-link">';
            } else {
                $url = '#';

                if (isset($item['page'])) {
                    $url = url("application/" . $item['page']);
                }

                $target = '';
                if (isset($item['new-tab']) && $item['new-tab'] == true) {
                    $target = 'target="_blank"';
                }

            }

            // Menu arrow
            if (isset($item['here']) && $item['here'] === true) {
                echo '<span class="menu-item-here"></span>';
            }

            // bullet
            $bullet = '';

            if ($parent != null && isset($parent['bullet']) && $parent['bullet'] == 'dot') {
                $bullet = 'dot';
            } elseif ($parent != null && isset($parent['bullet']) && $parent['bullet'] == 'line') {
                $bullet = 'line';
            }

            // dd(Route::current()->getName());

            if(isset($item['submenu'])){
                echo '
                
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/text/txt002.svg-->
                                <span class="svg-icon svg-icon-2">
                                    ';
                                    
                                    echo $item['icon'];

                                echo   '
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">' . $item['title'] . '</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            ';
                            
                                foreach ($item['submenu'] as $submenu) {

                                    $url = url("application/" . $submenu['page']);

                                    echo '

                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link '. (str_contains((Route::current()->getName() ?? ''), ($submenu['page'] ?? '')) ? 'active' : '') .'" href="'. $url .'">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">' . $submenu['title'] . '</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                    
                                    
                                    ';

                                }

                          echo  '
                        </div>
                        <!--end:Menu sub-->
                </div>
                ';
            }else{
                echo '
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link '. (str_contains((Route::current()->getName() ?? ''), ($item['page'] ?? '')) ? 'active' : '') .'" href="'. $url .'">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                                <span class="svg-icon svg-icon-2"> ';
                                    
                
                echo $item['icon'];
    
                // Badge
                                echo '
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">' . $item['title'] . '</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    ';
            }
            // echo '<span class="menu-text">' . $item['title'] . '</span>';
            if (isset($item['label'])) {
                echo '<span class="menu-badge"><span class="label ' . $item['label']['type'] . '">' . $item['label']['value'] . '</span></span>';
            }

            if ($singleItem == true) {
                if (isset($item['parent'])) {
                    echo '</span>';
                } else {
                    echo '</a>';
                }

                // echo '</li>';
                return;
            }


            if (isset($item['parent'])) {
                echo '</span>';
            } else {
                echo '</a>';
            }

            // echo '</li>';
        } else {
            foreach ($item as $key => $each) {
                if (!is_int($key)) {
                    if (!\auth()->user()->can($key)) {
                        continue;
                    }
                }
                self::renderVerMenu($each, $parent, $rec++);
            }
        }
    }

    /**
     * Header menu
     * @param $item
     * @param null $parent
     * @param int  $rec
     */
    public static function renderHorMenu($item, $parent = null, $rec = 0)
    {
        self::checkRecursion($rec);
        if (!$item) {
            return 'menu misconfiguration';
        }

        // render separator
        if (isset($item['separator'])) {
            echo '<li class="menu-separator"><span></span></li>';
        } elseif (isset($item['title']) || isset($item['code'])) {
            $item_class = '';
            $item_attr = '';

            if (isset($item['submenu']) && self::isActiveHorMenuItem($item, request()->path())) {
                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active

                if (@$item['submenu']['type'] == 'tabs') {
                    $item_class .= ' menu-item-active-tab ';
                }
            } elseif (self::isActiveHorMenuItem($item, request()->path())) {
                $item_class .= ' menu-item-active ';

                if (@$item['submenu']['type'] == 'tabs') {
                    $item_class .= ' menu-item-active-tab ';
                }
            }

            if (isset($item['submenu'])) {
                $item_class .= ' menu-item-submenu'; // m-menu__item--active

                if (isset($item['toggle']) && $item['toggle'] == 'click') {
                    $item_attr .= ' data-menu-toggle="click"';
                } elseif (@$item['submenu']['type'] == 'tabs') {
                    $item_attr .= ' data-menu-toggle="tab"';
                } else {
                    $item_attr .= ' data-menu-toggle="hover"';
                }
            }

            if (@$item['redirect'] === true) {
                $item_attr .= ' data-menu-redirect="1"';
            }

            if (isset($item['submenu'])) {
                if (!isset($item['submenu']['type'])) {
                    // default option
                    $item['submenu']['type'] = 'classic';
                    $item['submenu']['alignment'] = 'right';
                }
                if (($item['submenu']['type'] == 'classic') && isset($item['root'])) {
                    $item_class .= ' menu-item-rel';
                }

                if (($item['submenu']['type'] == 'mega') && isset($item['root']) && @$item['align'] != 'center') {
                    $item_class .= ' menu-item-rel';
                }

                if ($item['submenu']['type'] == 'tabs') {
                    $item_class .= ' menu-item-tabs';
                }
            }

            if (isset($item['submenu']['items']) && self::isActiveHorMenuItem($item['submenu'], request()->path())) {
                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active
            }

            if (isset($item['custom-class'])) {
                $item_class .= ' ' . $item['custom-class'];
            }

            if (@$item['icon-only'] == true) {
                $item_class .= ' menu-item-icon-only';
            }

            if (isset($item['heading']) == false) {
                echo '<li class="menu-item ' . $item_class . '" ' . $item_attr .  ' aria-haspopup="true">';
            }

            // check if code is provided instead of link
            if (isset($item['code'])) {
                echo $item['code'];
            } else {
                // insert title or heading
                if (isset($item['heading']) == false) {
                    $url = '#';

                    if (isset($item['page'])) {
                        $url = url("application/" . $item['page']);
                    }

                    $target = '';
                    if (isset($item['new-tab']) && $item['new-tab'] == true) {
                        $target = 'target="_blank"';
                    }

                    echo '<a ' . $target . ' href="' . $url . '" class="menu-link ' . (isset($item['submenu']) ? 'menu-toggle' : '') . '">';
                } else {
                    echo '<h3 class="menu-heading menu-toggle">';
                }

                // put root level arrow
                if (@$item['here'] === true) {
                    echo '<span class="menu-item-here"></span>';
                }

                // bullet
                $bullet = '';

                if ((@$item['heading'] && @$item['bullet'] == 'dot') || @$parent['bullet'] == 'dot') {
                    $bullet = 'dot';
                } elseif ((@$item['heading'] && @$item['bullet'] == 'line') || @$parent['bullet'] == 'line') {
                    $bullet = 'line';
                }

                // Menu icon OR bullet
                if ($bullet == 'dot') {
                    echo '<i class="menu-bullet menu-bullet-dot"><span></span></i>';
                } elseif ($bullet == 'line') {
                    echo '<i class="menu-bullet menu-bullet-line"><span></span></i>';
                } elseif (isset($item['icon']) && !empty($item['icon'])) {
                    self::renderIcon($item['icon']);
                }

                // Badge
                echo '<span class="menu-text">' . $item['title'] . '</span>';
                if (isset($item['label'])) {
                    echo '<span class="menu-badge"><span class="label ' . $item['label']['type'] . '">' . $item['label']['value'] . '</span></span>';
                }
                // Arrow
                if (isset($item['submenu']) && (!isset($item['arrow']) || $item['arrow'] != false)) {
                    // root down arrow
                    if (isset($item['root'])) {
                        // enable/disable root arrow
                        if (config('layout.header.menu.self.root-arrow') !== false) {
                            echo '<i class="menu-hor-arrow"></i>';
                        };
                    } else {
                        // inner menu arrow
                        echo '<i class="menu-hor-arrow"></i>';
                    }
                    echo '<i class="menu-arrow"></i>';
                }

                // closing title or heading
                if (isset($item['heading']) == false) {
                    echo '</a>';
                } else {
                    echo '<i class="menu-arrow"></i></h3>';
                }

                if (isset($item['submenu'])) {
                    if (in_array($item['submenu']['type'], array('classic', 'tabs'))) {
                        if (isset($item['submenu']['alignment'])) {
                            $submenu_class = ' menu-submenu-' . $item['submenu']['alignment'];

                            if (isset($item['submenu']['pull']) && $item['submenu']['pull'] == true) {
                                $submenu_class .= ' menu-submenu-pull';
                            }
                        }

                        if ($item['submenu']['type'] == 'tabs') {
                            $submenu_class .= ' menu-submenu-tabs';
                        }

                        echo '<div class="menu-submenu menu-submenu-classic' . $submenu_class . '">';

                        echo '<ul class="menu-subnav">';
                        $items = array();
                        if (isset($item['submenu']['items'])) {
                            $items = $item['submenu']['items'];
                        } else {
                            $items = $item['submenu'];
                        }
                        foreach ($items as $submenu_item) {
                            self::renderHorMenu($submenu_item, $item, $rec++);
                        }
                        echo '</ul>';
                        echo '</div>';
                    } elseif ($item['submenu']['type'] == 'mega') {
                        $submenu_fixed_width = '';

                        if (intval(@$item['submenu']['width']) > 0) {
                            $submenu_class = ' menu-submenu-fixed';
                            $submenu_fixed_width = 'style="width:' . $item['submenu']['width'] . '"';
                        } else {
                            $submenu_class = ' menu-submenu-' . $item['submenu']['width'];
                        }

                        if (isset($item['submenu']['alignment'])) {
                            $submenu_class .= ' menu-submenu-' . $item['submenu']['alignment'];

                            if (isset($item['submenu']['pull']) && $item['submenu']['pull'] == true) {
                                $submenu_class .= ' menu-submenu-pull';
                            }
                        }

                        echo '<div class="menu-submenu ' . $submenu_class  . '" ' . ($submenu_fixed_width) . '>';

                        echo '<div class="menu-subnav">';
                        echo '<ul class="menu-content">';
                        foreach ($item['submenu']['columns'] as $column) {
                            $item_class = '';
                            // mega menu column header active
                            if (isset($column['items']) && self::isActiveVerMenuItem($column, request()->path())) {
                                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active
                            }

                            echo '<li class="menu-item ' . $item_class . '">';
                            if (isset($column['heading'])) {
                                self::renderHorMenu($column['heading'], null, $rec++);
                            }
                            echo '<ul class="menu-inner">';
                            foreach ($column['items'] as $column_submenu_item) {
                                self::renderHorMenu($column_submenu_item, $column, $rec++);
                            }
                            echo '</ul>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }

            if (isset($item['heading']) == false) {
                echo '</li>';
            }
        } elseif (is_array($item)) {
            foreach ($item as $each) {
                self::renderHorMenu($each, $parent, $rec++);
            }
        }
    }

    // Check for active Vertical Menu item
    public static function isActiveVerMenuItem($item, $page, $rec = 0)
    {
        if (!empty($item['page'])) {
            $item['page'] = 'application/'.$item['page'];
        }

        if (isset($item['redirect']) && $item['redirect'] == $page) {
            return false;
        }

        self::checkRecursion($rec);

        if (isset($item['page']) && ($item['page'] == $page || $item['page'] == ltrim(request()->getRequestUri(), '/'))) {
            return true;
        }
        // if (isset($item['page']) && (strpos($page, $item['page']) > -1)) {
        //     return true;
        // }

        if (is_array($item)) {
            foreach ($item as $each) {
                if (self::isActiveVerMenuItem($each, $page, $rec++)) {
                    return true;
                }
            }
        }

        return false;
    }

    // Check for active Horizontal Menu item
    public static function isActiveHorMenuItem($item, $page, $rec = 0)
    {
        if (isset($item['redirect']) && $item['redirect'] == $page) {
            return false;
        }

        self::checkRecursion($rec);

        if (isset($item['page']) && $item['page'] == $page) {
            return true;
        }

        if (is_array($item)) {
            foreach ($item as $each) {
                if (self::isActiveHorMenuItem($each, $page, $rec++)) {
                    return true;
                }
            }
        }

        return false;
    }

    // Checks recursion depth
    public static function checkRecursion($rec, $max = 10000)
    {
        if ($rec > $max) {
            echo 'Too many recursions!!!';
            exit;
        }
    }

    // Render icon or bullet
    public static function renderIcon($icon)
    {

        if (Metronic::isSVG($icon)) {
            echo Metronic::getSVG($icon, 'menu-icon');
        } else {
            echo '<i class="menu-icon ' . $icon . '"></i>';
        }
    }
}
