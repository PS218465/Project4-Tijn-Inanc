   M S B A M L   `   `   `  ����F  Bstonkspizza, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null;"clr-namespace:stonkspizza.InBeheerstonkspizza.InBeheer  5   	   '    !stonkspizza.InBeheer.Ingredienten   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   4local"clr-namespace:stonkspizza.InBeheer     5   	     � Title$  Ingredienten��5   	   $	��450��6   $	��800��6+   .��5	      � ���#393939$��0,0,2,0q�6     � ColumnDefinitions 5
   
   �� 5      $��* �6   �� 5      $	��30* �6   �� 5      $	��500 �6   .+�5   
   �� -   5         ��Name$ 	LvProduct��5   #   $��1��6   $��2q�66   ���	#FF0088FF���#6AD8E3$��	1,0,499,5q�6�   ���#575757$��2��6�   ��6c   �� *Ingredientenlist+��5      �� 5      .R�5      �� ��5      `� 5       �� StringFormat$  {0} soort: {1}��6+   .1�5   "   ��  �� Path$
 Naam�6*   �� 5   "   $ Soort�6*   5      5      5      5      �� 5   
   -   5         ��Name$ tbpizzanaam��5   �   $��2��6   $��20��6$   $	��Top=�60   $��15(�6H   ���	#FF0088FF
�������6�   �� 5   
   $��2��6   $��20��6$   $	��Top=�60   $��15(�6H   ���	#FF0088FF
�������$��36,28,284,0q�6�   ingredienten van de pizza6�   �� 5   
   -   5        $ 	Lvinglist��5   $   $��2��6   $��2q�67   ���	#FF0088FF$	��180��6�   $	��356��6�   $��Bottom=�6�   $��Right=�6�   ���#6AD8E3$��
0,0,284,10q�6�   ���#575757��6d   �� *PizzaIngredienten+��5       �� 5!      .R�5"      �� ��5#      `� 5$      $  {0} soort: {1}��6+   .1�5%   "   �� $
 Naam�6*   �� 5&   "   $ Soort�6*   5'      5)      5*      5,      �� 5-   
   -   5        $��35��5-      $��Ga terug��6   $	��150��61   $��2��6=   ���	#FFF94747
�������$��325,358,25,27q�6�    � 	Resources 5.       �� 
TargetType �� Property	 �� Value��%^   '��       �� 5/      " ��6   .�50      ��  �@��CornerRadius$	 8��65   51      52      53      54      55      