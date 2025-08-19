<?php 
function construirMenu($menu, $padreId = 0, $nivel = 0) {
    if (!isset($menu[$padreId])) return '<span class="text-danger p-4">Sin elementos en el menu</span>';
    
    $html = '';
    $claseSubmenu = $nivel > 0 ? 'submenu-' . $nivel : '';
    foreach ($menu[$padreId] as $item) {
        $tieneHijos = isset($menu[$item['FIELEMENOMENUID']]);
        
        if ($tieneHijos) {
            $html .= '<li class="nav-item has-submenu">';
            $html .= '<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-' . $item['FIELEMENOMENUID'] . '">';
            $html .= '<span class="nav-icon">' . $item['FCINOCOMENU'] . '</span>';
            $html .= '<span class="nav-link-text">' . $item['FCTITULO'] . '</span>';
            $html .= '<span class="submenu-arrow">';
            $html .= '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">';
            $html .= '<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>';
            $html .= '</svg>';
            $html .= '</span>';
            $html .= '</a>';
            $html .= '<div id="submenu-' . $item['FIELEMENOMENUID'] . '" class="collapse submenu ' . $claseSubmenu . '" data-bs-parent="#menu-accordion">';
            $html .= '<ul class="submenu-list list-unstyled">';
            $html .= construirMenu($menu, $item['FIELEMENOMENUID'], $nivel + 1);
            $html .= '</ul></div>';
        } else {
            $html .= '<li class="nav-item">';
            $html .= '<a class="nav-link" href="' . base_url($item['FCURL']) . '">';
            $html .= '<span class="nav-icon">' . $item['FCINOCOMENU'] . '</span>';
            $html .= '<span class="nav-link-text">' . $item['FCTITULO'] . '</span>';
            $html .= '</a>';
        }
        $html .= '</li>';
    }
    
    return $html;
}
?>
    <!-- En tu HTML -->
    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
      <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <?= construirMenu($menu, 0) ?>
      </ul>
    </nav>
    </div>
    </div>