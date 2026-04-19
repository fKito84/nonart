import { createBrowserRouter } from "react-router";
import { Layout } from "./components/Layout";
import Home from "./pages/Home";
import Store from "./pages/Store";
import ArtworkDetail from "./pages/ArtworkDetail";
import Workshops from "./pages/Workshops";
import Cart from "./pages/Cart";
import Login from "./pages/Login";
import Account from "./pages/Account";

export const router = createBrowserRouter([
  {
    path: "/",
    Component: Layout,
    children: [
      { index: true, Component: Home },
      { path: "obres", Component: Store },
      { path: "obres/:id", Component: ArtworkDetail },
      { path: "tallers", Component: Workshops },
      { path: "carret", Component: Cart },
      { path: "login", Component: Login },
      { path: "compte", Component: Account },
    ],
  },
]);
