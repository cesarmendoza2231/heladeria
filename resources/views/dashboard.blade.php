@extends('layouts.app')

@section('title', 'Dashboard - Heladería Delicia')

@section('content')
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Bienvenida -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-pink-600">¡Bienvenido, {{ $user['name'] }}!</h1>
                <p class="mt-2 text-gray-600">Panel de control de Heladería Delicia</p>
            </div>

            <!-- Notificaciones -->
            @if($notificaciones['nuevos_sabores'] > 0 || $notificaciones['pedidos_pendientes'] > 0)
            <div class="bg-white shadow rounded-lg p-4 mb-8">
                <h3 class="font-medium text-lg text-gray-800 mb-2"><i class="fas fa-bell text-yellow-500 mr-2"></i> Notificaciones</h3>
                <ul class="space-y-2">
                    @if($notificaciones['nuevos_sabores'] > 0)
                    <li class="flex items-center">
                        <i class="fas fa-ice-cream text-pink-500 mr-2"></i>
                        Tienes {{ $notificaciones['nuevos_sabores'] }} nuevos sabores por aprobar
                    </li>
                    @endif
                    @if($notificaciones['pedidos_pendientes'] > 0)
                    <li class="flex items-center">
                        <i class="fas fa-shopping-basket text-purple-500 mr-2"></i>
                        {{ $notificaciones['pedidos_pendientes'] }} pedidos pendientes
                    </li>
                    @endif
                </ul>
            </div>
            @endif

            <!-- Contenido según tipo de usuario -->
            @if($user['role'] == 'admin')
            <!-- Dashboard Admin -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-medium text-lg text-gray-800 mb-4">Ventas Totales</h3>
                    <p class="text-3xl font-bold text-pink-600">{{ $dashboard_data['estadisticas']['ventas_totales'] }}</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-medium text-lg text-gray-800 mb-4">Clientes Nuevos</h3>
                    <p class="text-3xl font-bold text-purple-600">{{ $dashboard_data['estadisticas']['clientes_nuevos'] }}</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-medium text-lg text-gray-800 mb-4">Ingresos</h3>
                    <p class="text-3xl font-bold text-green-600">${{ number_format($dashboard_data['estadisticas']['ingresos'], 2) }}</p>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h3 class="font-medium text-lg text-gray-800 mb-4">Helados más vendidos</h3>
                <div class="space-y-4">
                    @foreach($dashboard_data['helados'] as $helado)
                    <div class="flex justify-between items-center border-b pb-2">
                        <span>{{ $helado['nombre'] }}</span>
                        <span class="font-medium">{{ $helado['ventas'] }} ventas (Stock: {{ $helado['stock'] }})</span>
                    </div>
                    @endforeach
                </div>
            </div>

            @else
            <!-- Dashboard Cliente -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-medium text-lg text-gray-800 mb-4">Tus puntos</h3>
                    <div class="flex items-center">
                        <i class="fas fa-star text-yellow-500 text-4xl mr-4"></i>
                        <div>
                            <p class="text-3xl font-bold text-pink-600">{{ $dashboard_data['puntos'] }}</p>
                            <p class="text-gray-600">Nivel {{ $dashboard_data['nivel'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-medium text-lg text-gray-800 mb-4">Próxima recompensa</h3>
                    <div class="flex items-center">
                        <i class="fas fa-gift text-purple-500 text-4xl mr-4"></i>
                        <p class="text-lg">¡Solo 250 puntos más para un helado gratis!</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="font-medium text-lg text-gray-800 mb-4">Tus helados favoritos</h3>
                <div class="space-y-3">
                    @foreach($dashboard_data['helados_favoritos'] as $helado)
                    <div class="flex justify-between items-center p-3 bg-pink-50 rounded-lg">
                        <span class="font-medium">{{ $helado['nombre'] }}</span>
                        <span class="text-sm text-gray-500">Última compra: {{ $helado['ultima_compra'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection