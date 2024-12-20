<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use App\Models\compra_detalle;
use App\Models\compra_vista_superior;

class CartController extends Controller
{   
    public function shop()
    {
        $cursos = Curso::all();
        dd($cursos);
        return view('Curso')->withTitle('Tienda Cursos Profecionales| SHOP')->with(['cursos' => $cursos]);
    }

    public function cart()  {
        $cartCollection = Cart::getContent();
        
        return view('Carrito.cart')->withTitle('Tienda Cursos Profecionales | CART')->with(['cartCollection' => $cartCollection]);;
    }
    public function add(Request $request)
    {
        // Validar los datos recibidos del formulario
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:cursos,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'attributes.image' => 'nullable|url',
            'attributes.slug' => 'nullable|string|max:255',
        ]);
    
        // Manejar correctamente los atributos y asignar valores predeterminados si son nulos
        $attributes = [
            'image' => $request->input('attributes.image', null), // Usar el valor enviado o null por defecto
            'slug' => $request->input('attributes.slug', null),   // Usar el valor enviado o null por defecto
        ];
    
        // Agregar el producto al carrito
        \Cart::add([
            'id' => $validatedData['id'],
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'attributes' => $attributes,
        ]);
    
        // Depuración opcional: Verificar los datos que se están guardando en el carrito
        // dd(\Cart::getContent());
    
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }
    

    

    public function show()
    {
        $items = Cart::getContent();
        return view('Carrito.cart', compact('items'));
    }

    public function remove(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }
    

    public function clear()
    {
        Cart::clear();
        return redirect()->back()->with('success', 'Carrito vaciado');
    }

    public function confirmacion($id)
        {
            $compra = compra_vista_superior::with('detalles')->findOrFail($id);
            return view('Carrito.compraConfirmada', compact('compra'));
        }
    
        public function listarCompras()
        {
            // Obtener las compras del usuario autenticado
            $compras = compra_vista_superior::where('id_alumno_compra', auth()->id())
                ->with(['detalles.curso'])
                ->get();
    
            return view('Carrito.compras', compact('compras'));
        }

public function procesar(Request $request)
    {
        // 1. Obtener el carrito (puede venir de sesión o base de datos)
        $carrito = session('carrito', []); // Asumimos que el carrito está en sesión.

        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        // 2. Crear la compra superior (resumen de la compra)
        $compraSuperior = compra_vista_superior::create([
            'id_alumno_compra' => auth()->user()->id, // ID del alumno logueado
            'cantidad' => count($carrito),
        ]);

        // 3. Crear detalles de la compra
        $total = 0;
        foreach ($carrito as $curso) {
            compra_detalle::create([
                'id_compra_superior' => $compraSuperior->id,
                'id_compra_curso' => $curso['id_curso'],
                'total' => $curso['precio'],
            ]);

            $total += $curso['precio'];
        }

        // 4. Actualizar el total en la compra superior
        $compraSuperior->update(['total' => $total]);

        // 5. Limpiar el carrito
        session()->forget('carrito');

        // 6. Redirigir con mensaje de éxito
        return redirect()->route('Cart.compraConfirmada', ['id' => $compraSuperior->id])
            ->with('success', 'Compra realizada con éxito.');
    }
   
}
