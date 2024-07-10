<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Coffee;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'coffee_name' => 'required|string',
        'quantity' => 'required|integer|min:1',
    ]);

    $coffee = Coffee::where('name', $request->coffee_name)->first();

    if (!$coffee) {
        return response()->json(['message' => 'Coffee not found.'], Response::HTTP_NOT_FOUND);
    }

    $order = Order::create([
        'user_id' => Auth::id(), // Set user_id dengan ID pengguna yang sedang login
        'coffee_id' => $coffee->id,
        'quantity' => $request->quantity,
        'total_price' => $coffee->price * $request->quantity,
    ]);

    return response()->json(['message' => 'Order created successfully.', 'data' => $order], Response::HTTP_CREATED);
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'coffee_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], Response::HTTP_NOT_FOUND);
        }

        $coffee = Coffee::where('name', $request->coffee_name)->first();

        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found.'], Response::HTTP_NOT_FOUND);
        }

        if ($order->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        $order->coffee_id = $coffee->id;
        $order->quantity = $request->quantity;
        $order->total_price = $coffee->price * $request->quantity;
        $order->save();

        return response()->json(['message' => 'Order updated successfully.', 'data' => $order], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], Response::HTTP_NOT_FOUND);
        }

        if ($order->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        $order->delete();

        return response()->json(['message' => 'Order successfully deleted.'], Response::HTTP_OK);
    }

    public function userOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();

        return response()->json(['data' => $orders], Response::HTTP_OK);
    }
}
