<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;

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
}
