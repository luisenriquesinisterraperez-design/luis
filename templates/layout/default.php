<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-100">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>DAVIRAPID - <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('tailwind.css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            -webkit-font-smoothing: antialiased;
            color: #1e293b;
        }
        
        /* Layout Structure */
        .app-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        @media (min-width: 1024px) {
            .app-container {
                flex-direction: row;
            }
        }

        /* Sidebar - Brand Colors (Red & Black) */
        .sidebar {
            width: 280px;
            background: #1a1a1a; /* Dark Black */
            color: #f8fafc;
            flex-shrink: 0;
            display: none;
            border-right: 4px solid #ef4444; /* Red Border */
        }

        @media (min-width: 1024px) {
            .sidebar {
                display: flex;
                flex-direction: column;
                position: sticky;
                top: 0;
                height: 100vh;
                overflow-y: auto;
            }
        }

        /* Nav Links Refined */
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            margin: 4px 16px;
            color: #e2e8f0;
            font-size: 0.875rem;
            font-weight: 700;
            border-radius: 12px;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            background: #2a2a2a;
            border: 1px solid #3a3a3a;
        }

        .nav-link:hover {
            color: #ffffff;
            background: #333333;
            border-color: #dc2626;
        }

        .nav-link.active {
            color: #ffffff;
            background: #dc2626;
            border-color: #dc2626;
            box-shadow: 0 8px 20px -4px rgba(220, 38, 38, 0.4);
        }

        .nav-link i {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            min-width: 0;
            background: #f1f5f9;
        }

        /* Mobile Header */
        .mobile-header {
            background: #1a1a1a;
            color: white;
            padding: 16px 20px;
            position: sticky;
            top: 0;
            z-index: 50;
            border-bottom: 3px solid #ef4444;
        }

        /* Professional Details */
        .section-tag {
            padding: 24px 24px 8px 32px;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #64748b;
        }

        /* Mobile Drawer Scroll Fix */
        #mobile-drawer {
            max-height: 100vh;
        }
        #mobile-drawer .drawer-scroll {
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: contain;
            max-height: calc(100vh - 80px);
        }

        @media (min-width: 1024px) {
            .sidebar {
                -webkit-overflow-scrolling: touch;
                overscroll-behavior: contain;
            }
        }

        /* Custom Cards Styling */
        .dashboard-card {
            background: white;
            border-radius: 24px;
            border-bottom: 4px solid transparent;
            transition: transform 0.2s;
        }
        .dashboard-card:hover { transform: translateY(-5px); }
        .card-yellow { border-color: #facc15; }
        .card-blue { border-color: #2563eb; }
        .card-red { border-color: #ef4444; }
        .card-black { border-color: #0f172a; }

        /* Missing Tailwind utilities (not in compiled tailwind.css) */
        .bg-dark { background: #1a1a1a !important; }
        .bg-gradient-red-orange { background: linear-gradient(to right, #dc2626, #ea580c) !important; }
        .shadow-premium { box-shadow: 0 20px 60px -12px rgba(0,0,0,0.5) !important; }
        .shadow-red-200 { box-shadow: 0 4px 6px -1px rgba(254,202,202,0.5) !important; }
        .shadow-yellow-400\/30 { box-shadow: 0 25px 50px -12px rgba(250,204,21,0.3) !important; }
        .focus-within-border-yellow:focus-within { border-color: #facc15 !important; }
        .hover-bg-yellow-400:hover { background: #facc15 !important; }
        .hover-text-slate-900:hover { color: #0f172a !important; }
        .active-scale-98:active { transform: scale(0.98) !important; }
    </style>
</head>
<body class="h-full overflow-x-hidden">

    <?php 
    $identity = $this->request->getAttribute('identity');
    $user = $identity ? $identity->getOriginalData() : null;
    $isAdmin = ($user && (!empty($user->is_superadmin) || $user->username === 'admin' || $user->role === 'admin'));
    $isStaff = ($user && !empty($user->role) && $user->role === 'staff');
    $isRepartidor = ($user && !empty($user->role) && $user->role === 'repartidor');
    $isCliente = ($user && !empty($user->role) && $user->role === 'cliente');
    
    if ($user): 
    ?>
    <div class="app-container">
        <!-- Sidebar Desktop -->
        <aside class="sidebar">
            <div class="p-8 mb-4 bg-[#1e293b]/50">
                <div class="flex items-center gap-4">
                    <div class="bg-yellow-400 w-12 h-12 flex items-center justify-center rounded-2xl shadow-lg shadow-yellow-400/20">
                        <img src="<?= $this->Url->image('cake-logo.jpeg') ?>" alt="DAVIRAPID" class="w-10 h-10 rounded-xl object-cover">
                    </div>
                    <div>
                        <span class="font-black text-xl tracking-tighter text-white uppercase italic leading-none block">
                            DAVIRAPID<span class="text-yellow-400">.</span>
                        </span>
                        <span class="text-[9px] font-black text-orange-400 tracking-[0.3em] uppercase">Comidas Rápidas</span>
                    </div>
                </div>
            </div>

            <nav class="flex-1 flex flex-col pb-8">
                <div class="section-tag text-orange-400">Menú de Usuario</div>
                <?php
                $catalogAction = ($isAdmin || $isStaff) ? 'index' : 'catalog';
                $navItems = [
                    ['Dashboard', 'index', 'fa-chart-pie', 'Resumen', true],
                    ['Orders', 'index', 'fa-receipt', 'Ventas', ($isAdmin || $isStaff || $isRepartidor)],
                    ['Requests', 'index', 'fa-clock', 'Solicitudes', ($isAdmin || $isStaff)],
                    ['AccountsReceivable', 'index', 'fa-wallet', 'Mis Cuentas', true],
                    ['Products', $catalogAction, 'fa-store', 'Catálogo', true],
                    ['Adicionales', 'index', 'fa-cubes', 'Adicionales', ($isAdmin || $isStaff)],
                    ['DailyClosures', 'index', 'fa-vault', 'Caja', ($isAdmin || $isStaff)],
                    ['Expenses', 'index', 'fa-coins', 'Gastos', ($isAdmin || $isStaff)],
                ];

                foreach ($navItems as $item):
                    if ($item[4]):
                        $active = $this->request->getParam('controller') == $item[0];
                ?>
                    <?= $this->Html->link(
                        '<i class="fa-solid ' . $item[2] . '"></i> ' . $item[3],
                        ['controller' => $item[0], 'action' => $item[1]],
                        ['escape' => false, 'class' => 'nav-link ' . ($active ? 'active' : '')]
                    ) ?>
                <?php endif; endforeach; ?>

                <?php if (!$isCliente && !$isRepartidor): ?>
                    <div class="section-tag">Catálogo & Base</div>
                    <?php
                    $adminItems = [
                        ['DeliveryDrivers', 'index', 'fa-truck-fast', 'Repartidores'],
                        ['Clients', 'index', 'fa-user-tag', 'Clientes'],
                        ['Ingredients', 'index', 'fa-microchip', 'Insumos'],
                    ];
                    foreach ($adminItems as $item):
                        $active = $this->request->getParam('controller') == $item[0];
                    ?>
                        <?= $this->Html->link(
                            '<i class="fa-solid ' . $item[2] . '"></i> ' . $item[3],
                            ['controller' => $item[0], 'action' => $item[1]],
                            ['escape' => false, 'class' => 'nav-link ' . ($active ? 'active' : '')]
                        ) ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($isAdmin): ?>
                    <div class="section-tag">Configuración</div>
                    <?= $this->Html->link('<i class="fa-solid fa-user-shield"></i> Usuarios', ['controller' => 'Users', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link ' . ($this->request->getParam('controller') == 'Users' ? 'active' : '')]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-sliders"></i> Ajustes', ['controller' => 'InventoryAdjustments', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link ' . ($this->request->getParam('controller') == 'InventoryAdjustments' ? 'active' : '')]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-calculator"></i> Sinc. Inventario', ['controller' => 'Dashboard', 'action' => 'syncInventory'], ['escape' => false, 'class' => 'nav-link ' . ($this->request->getParam('action') == 'syncInventory' ? 'active' : '')]) ?>
                <?php endif; ?>
            </nav>

            <div class="mt-auto border-t border-slate-800 p-6">
                <div class="flex items-center gap-3 bg-slate-800/50 p-3 rounded-xl border border-slate-700">
                    <div class="w-10 h-10 rounded-lg bg-red-600 flex items-center justify-center text-white font-black text-sm uppercase">
                        <?= substr($user->username, 0, 1) ?>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-white truncate"><?= h($user->username) ?></p>
                        <p class="text-[9px] text-yellow-400 font-bold uppercase"><?= h($user->role) ?></p>
                    </div>
                    <?= $this->Html->link('<i class="fa-solid fa-power-off"></i>', ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, 'class' => 'text-slate-400 hover:text-red-500 transition-colors']) ?>
                </div>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="main-content flex flex-col">
            <!-- Mobile Header -->
            <header class="lg:hidden mobile-header flex justify-between items-center shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="bg-yellow-400 w-8 h-8 flex items-center justify-center rounded-lg">
                        <img src="<?= $this->Url->image('cake-logo.jpeg') ?>" alt="DAVIRAPID" class="w-7 h-7 rounded object-cover">
                    </div>
                    <span class="font-black text-lg text-white uppercase italic tracking-tighter">DAVIRAPID<span class="text-yellow-400">.</span></span>
                </div>
                <button id="drawer-toggle" class="p-3 text-yellow-400 bg-neutral-800 rounded-lg">
                    <i class="fa-solid fa-bars-staggered text-xl"></i>
                </button>
            </header>

        <!-- Main Content -->
        <div class="p-4 md:p-10 max-w-full min-h-screen">
            <div class="mb-4 md:mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4 md:gap-6 bg-white p-4 md:p-6 rounded-3xl shadow-sm border border-slate-200">
                <div class="flex items-center gap-4 min-w-0">
                    <div class="w-1 h-10 md:w-1.5 md:h-12 bg-red-500 rounded-full shrink-0"></div>
                    <div class="min-w-0">
                        <h2 class="text-[10px] font-black text-red-500 uppercase tracking-[0.4em] mb-1">DaviRapid</h2>
                        <h1 class="text-lg md:text-3xl font-black text-slate-900 tracking-tight truncate"><?= h($this->fetch('title')) ?></h1>
                    </div>
                </div>
                <div class="flex items-center gap-2 md:gap-3 bg-gradient-red-orange px-3 md:px-5 py-2 md:py-2.5 rounded-2xl shadow-lg shadow-red-200 border border-red-400 shrink-0">
                    <i class="fa-solid fa-clock text-white/90 text-xs md:text-sm"></i>
                    <span class="text-[10px] md:text-xs font-bold text-white tracking-wide" id="live-clock"></span>
                </div>
            </div>
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="drawer-overlay" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md z-[90] opacity-0 pointer-events-none transition-opacity"></div>
    <div id="mobile-drawer" class="fixed inset-y-0 left-0 w-80 bg-dark z-[100] transform -translate-x-full transition-transform ease-in-out duration-300 shadow-2xl flex flex-col border-r-4 border-red-500">
        <div class="p-8 border-b border-slate-800 flex justify-between items-center bg-[#1e293b]/50">
            <span class="font-black text-yellow-400 uppercase text-xs tracking-widest">Navegación Pro</span>
            <button id="drawer-close" class="text-white"><i class="fa-solid fa-xmark text-2xl"></i></button>
        </div>
        <div class="flex-1 min-h-0 overflow-y-auto drawer-scroll pt-4">
            <div class="section-tag text-orange-400">Operaciones</div>
            <?php foreach ($navItems as $item): if (!isset($item[4]) || $item[4]): ?>
                <?= $this->Html->link('<i class="fa-solid ' . $item[2] . '"></i> ' . $item[3], ['controller' => $item[0], 'action' => $item[1]], ['escape' => false, 'class' => 'nav-link ' . ($this->request->getParam('controller') == $item[0] ? 'active' : '')]) ?>
            <?php endif; endforeach; ?>
            
            <?php if (!$isCliente && !$isRepartidor): ?>
            <div class="section-tag text-slate-500 pt-6">Administración</div>
            <?php foreach ($adminItems as $item): ?>
                <?= $this->Html->link('<i class="fa-solid ' . $item[2] . '"></i> ' . $item[3], ['controller' => $item[0], 'action' => $item[1]], ['escape' => false, 'class' => 'nav-link ' . ($this->request->getParam('controller') == $item[0] ? 'active' : '')]) ?>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if ($isAdmin): ?>
            <div class="section-tag text-orange-400 pt-6">Configuración</div>
                <?= $this->Html->link('<i class="fa-solid fa-user-shield"></i> Usuarios', ['controller' => 'Users', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link ' . ($this->request->getParam('controller') == 'Users' ? 'active' : '')]) ?>
                <?= $this->Html->link('<i class="fa-solid fa-sliders"></i> Ajustes', ['controller' => 'InventoryAdjustments', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link ' . ($this->request->getParam('controller') == 'InventoryAdjustments' ? 'active' : '')]) ?>
            <?php endif; ?>

            <div class="mt-8 p-6">
                <?= $this->Html->link('<i class="fa-solid fa-power-off mr-2"></i> Cerrar Sesión', ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, 'class' => 'w-full block bg-red-600 text-white text-center py-4 rounded-xl font-bold text-sm shadow-lg shadow-red-600/30']) ?>
            </div>
        </div>
    </div>

    <?php else: ?>
        <!-- Login Layout -->
        <main class="min-h-screen bg-dark flex items-center justify-center p-6">
            <div class="w-full max-w-sm">
                <div class="text-center mb-10">
                    <div class="bg-yellow-400 w-24 h-24 flex items-center justify-center rounded-[2rem] mx-auto shadow-2xl mb-6" style="box-shadow: 0 25px 50px -12px rgba(250,204,21,0.3)">
                        <img src="<?= $this->Url->image('cake-logo.jpeg') ?>" alt="DAVIRAPID" class="w-20 h-20 rounded-2xl object-cover">
                    </div>
                    <h1 class="text-5xl font-black text-white uppercase tracking-tight leading-none">DAVIRAPID</h1>
                    <p class="text-xs font-bold text-yellow-400 tracking-[0.3em] uppercase mt-3">Sistema de Gestión</p>
                </div>
                <div class="bg-white rounded-3xl shadow-premium overflow-hidden border border-red-100">
                    <div class="p-8 pt-10">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
                <div class="text-center mt-8">
                    <p class="text-[10px] text-slate-600 font-bold tracking-widest">© 2026 DAVIRAPID</p>
                </div>
            </div>
        </main>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('drawer-toggle');
            const close = document.getElementById('drawer-close');
            const drawer = document.getElementById('mobile-drawer');
            const overlay = document.getElementById('drawer-overlay');

            function openDrawer() {
                drawer.classList.remove('-translate-x-full');
                overlay.classList.remove('opacity-0', 'pointer-events-none');
                document.body.style.overflow = 'hidden';
            }

            function closeDrawer() {
                drawer.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0', 'pointer-events-none');
                document.body.style.overflow = '';
            }

            if(toggle) toggle.addEventListener('click', openDrawer);
            if(close) close.addEventListener('click', closeDrawer);
            if(overlay) overlay.addEventListener('click', closeDrawer);

            (function() {
                var el = document.getElementById('live-clock');
                if (!el) return;
                var months = 'ene_feb_mar_abr_may_jun_jul_ago_sep_oct_nov_dic'.split('_');
                var days = 'dom_lun_mar_mie_jue_vie_sab'.split('_');
                function tick() {
                    var d = new Date();
                    el.textContent = days[d.getDay()] + ' ' + d.getDate() + '/' + (d.getMonth()+1) + ' - ' + d.toLocaleTimeString('es-CO', {hour:'2-digit', minute:'2-digit'});
                }
                tick();
                setInterval(tick, 1000);
            })();
        });
    </script>
</body>
</html>
