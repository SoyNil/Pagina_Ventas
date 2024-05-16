<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function search(Request $request)
    {
    $query = $request->input('query');
    $sortBy = $request->input('sortBy');

    // Realiza la búsqueda de productos según el nombre
    $products = Product::where('name', 'like', "%$query%");

    // Ordena los productos según el precio
    if ($sortBy === 'asc') {
        $products->orderBy('price', 'asc');
    } elseif ($sortBy === 'desc') {
        $products->orderBy('price', 'desc');
    }

    $products = $products->get();

    return view('products.search', compact('products', 'query', 'sortBy'));
    }

    public function showAll()
    {
        $products = Product::all();
        return view('products.show_all', ['products' => $products]);
    }
    public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect('/products')->with('success', 'Producto eliminado exitosamente');
}
public function index()
{
    $products = Product::all();
    return view('products.index', ['products' => $products]);
}
    // Mostrar el formulario para añadir productos
    public function create()
    {
        return view('add_product');
    }

    // Almacenar un nuevo producto en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $productData = $request->only(['name', 'description', 'price']);
        // Almacenar la imagen si se ha subido una
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $productData['image'] = $imagePath;
        }
    
        $product = Product::create($productData);

        // Crear un nuevo producto
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        // Verificar si el producto se agregó correctamente
    if ($product) {
        // Producto agregado exitosamente
        return redirect()->route('products.create')->with('success', 'Producto añadido exitosamente.');
    } else {
        // Error al agregar el producto
        return redirect()->route('products.create')->with('error', 'Hubo un problema al agregar el producto. Por favor, inténtalo de nuevo.');
    }

        // Redirigir a la página de productos o a cualquier otra página
        return redirect()->route('products.create')->with('success', 'Producto añadido exitosamente.');
    }
}