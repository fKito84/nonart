<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alerta d'Estoc</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background-color: #ffffff; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .header { background-color: #c9973a; color: white; padding: 10px; text-align: center; border-radius: 8px 8px 0 0; }
        h1 { margin: 0; font-size: 20px; }
        .content { padding: 20px; color: #333; }
        .alert { color: #d9534f; font-weight: bold; font-size: 18px; }
        .footer { margin-top: 20px; font-size: 12px; color: #777; text-align: center; border-top: 1px solid #ddd; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Alerta de Sistema - Nonart</h1>
        </div>
        
        <div class="content">
            <p>Hola Administrador,</p>
            <p>El sistema ha detectat que un dels materials dels tallers està a punt d'esgotar-se.</p>
            
            <ul>
                <li><strong>Material:</strong> {{ $material->nom_material ?? 'Material desconegut' }}</li>
                <li><span class="alert"><strong>Quantitat restant:</strong> {{ $material->quantitat }} unitats</span></li>
            </ul>
            
            <p>Si us plau, revisa l'inventari i fes una comanda aviat per evitar quedar-te sense subministraments per als propers tallers.</p>
        </div>

        <div class="footer">
            Aquest és un missatge automàtic de la teva botiga Nonart. No responguis a aquest correu.
        </div>
    </div>
</body>
</html>