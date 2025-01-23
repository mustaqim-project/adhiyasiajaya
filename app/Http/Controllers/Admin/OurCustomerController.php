<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurCustomer;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;

class OurCustomerController extends Controller
{
    use FileUploadTrait;


    public function index()
    {
        $customers = OurCustomer::all();
        return view('admin.customers.index', compact('customers'));
    }


    public function create()
    {
        return view('admin.customers.create');
    }


    public function store(Request $request)
    {



        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required|url',
        ]);


        $imagePath = $this->handleFileUpload($request, 'image');


        OurCustomer::create([
            'name' => $request->name,
            'image' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect()->route('admin.customer.index')->with('success', 'Customer added successfully!');
    }


    public function edit($id)
    {
        $customer = OurCustomer::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }


    public function update(Request $request, $id)
    {
        $customer = OurCustomer::findOrFail($id);


        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required|url',
        ]);


        $imagePath = $this->handleFileUpload($request, 'image');
        $customer->update([
            'image' => $imagePath ?? $customer->image,
        ]);

        $customer->name = $request->name;
        $customer->url = $request->url;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }


    private function deleteOldFile($filePath)
    {
        $fullPath = public_path($filePath);

        if ($filePath && file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
    public function destroy($id)
    {
        try {

            $customer = OurCustomer::findOrFail($id);


            if ($customer->image) {
                $this->deleteOldFile($customer->image);
            }


            $customer->delete();


            return redirect()->route('admin.customer.index')->with('success', 'Customer deleted successfully!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->route('admin.customer.index')->with('error', 'Customer not found!');
        } catch (\Exception $e) {

            \Log::error("Failed to delete customer: " . $e->getMessage());


            return redirect()->route('admin.customer.index')->with('error', 'An error occurred while deleting the customer.');
        }
    }

}
